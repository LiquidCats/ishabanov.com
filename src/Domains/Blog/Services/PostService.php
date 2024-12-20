<?php

declare(strict_types=1);

namespace App\Domains\Blog\Services;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blocks\Parsers\RawCollectionParser;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Dto\PostDto;
use App\Domains\Blog\ValueObjects\PostId;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use function now;

readonly class PostService implements PostServiceContract
{
    public function __construct(
        private RawCollectionParser $blockParser,
    ) {}

    public function paginate(): LengthAwarePaginator
    {
        return PostModel::query()
            ->select(['id', 'preview', 'title', 'preview_image_type', 'preview_image_id', 'published_at', 'is_draft'])
            ->with('tags')
            ->with('previewImage')
            ->latest('id')
            ->paginate(perPage: 10);
    }

    public function getPost(PostId $postId): PostModel
    {
        /** @var PostModel $post */
        $post = PostModel::query()
            ->with('tags')
            ->with('previewImage')
            ->findOrFail($postId);

        $post->blocks = $this->blockParser->parse($post->blocks);

        return $post;
    }

    public function createPost(PostDto $dto): PostModel
    {
        return DB::transaction(function () use ($dto) {
            $model = (new PostModel)->create($this->dtoWithBlocks($dto));

            $tagIds = $dto->tags->pluck('id');

            $model->tags()->sync($tagIds);

            $model->load(['previewImage', 'tags']);

            return $model;
        });
    }

    public function updatePost(PostId $postId, PostDto $dto): PostModel
    {
        return DB::transaction(function () use ($postId, $dto) {
            $model = PostModel::query()
                ->findOrFail($postId)
                ->updateById($postId, $this->dtoWithBlocks($dto));

            $tagIds = $dto->tags->pluck('id');

            $model->tags()->sync($tagIds);

            $model->load(['previewImage', 'tags']);

            return $model;
        });
    }

    public function changeState(PostId $postId): PostModel
    {
        /** @var PostModel $model */
        $model = PostModel::query()->findOrFail($postId);

        $model->is_draft = ! $model->is_draft;
        $model->published_at = Carbon::now();

        $model->save();

        return $model;
    }

    public function deletePost(PostId ...$postId): Collection
    {
        /** @var Collection<PostModel> $posts */
        $posts = PostModel::query()->find($postId);

        DB::transaction(function () use ($posts) {
            foreach ($posts as $post) {
                $post->delete();
            }
        });

        return $posts;
    }

    private function dtoWithBlocks(PostDto $dto): PostDto
    {
        return new PostDto(
            $dto->title,
            $dto->preview,
            $dto->publishedAt,
            $dto->isDraft,
            $this->blockParser->parse($dto->blocks),
            $dto->previewImageId,
            $dto->previewImageType,
            $dto->tags,
        );
    }

    public function getArticle(PostId $postId): array
    {
        $post = PostModel::query()
            ->with('tags')
            ->with('previewImage')
            ->findOrFail($postId);

        return [
            'post' => $post,
            'previous' => $this->getPrevious($postId),
            'next' => $this->getNext($postId),
            'similar' => $this->getSimilarByTag($postId, $post->tags),
        ];
    }

    public function getArticles(Collection $tags = new Collection): LengthAwarePaginator
    {
        return PostModel::query()
            ->select(['id', 'preview', 'title', 'preview_image_type', 'preview_image_id', 'published_at'])
            ->with('tags')
            ->with('previewImage')
            ->where('published_at', '<=', now())
            ->where('is_draft', 0)
            ->when($tags->isNotEmpty(), fn (Builder $q) => $q
                ->whereHas('tags', fn (Builder $q) => $q
                    ->whereIn('slug', $tags)
                )
            )
            ->latest('id')
            ->paginate(perPage: 6);
    }


    public function getPrevious(PostId $postId): ?PostModel
    {
        return PostModel::query()
            ->select(['title', 'id'])
            ->where('id', '<', $postId->value)
            ->latest('id')
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->first();
    }

    public function getNext(PostId $postId): ?PostModel
    {
        return PostModel::query()
            ->select(['title', 'id'])
            ->where('id', '>', $postId)
            ->oldest('id')
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->first();
    }

    /**
     * @param  Collection<int, TagModel>  $tags
     * @return Collection<int, PostModel>
     */
    public function getSimilarByTag(PostId $postId, Collection $tags): Collection
    {
        return PostModel::query()
            ->select(['title', 'preview', 'published_at', 'id'])
            ->whereHas('tags', static function (Builder $builder) use ($tags) {
                $builder->where(function (Builder $builder) use ($tags) {
                    foreach ($tags as $tag) {
                        $builder->orWhere('id', $tag->getKey());
                    }
                });
            })
            ->where('id', '!=', $postId)
            ->where('is_draft', 0)
            ->where('published_at', '<=', now())
            ->latest('id')
            ->limit(3)
            ->get();
    }
}
