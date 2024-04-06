<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Domains\Blocks\Contracts\Renderers\BlocksRendererContract;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Dto\PostDto;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\User\ValueObjets\UserId;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

readonly class PostService implements PostServiceContract
{
    public function __construct(
        private PostRepositoryContract $postRepository,
        private BlocksRendererContract $blocksRenderer
    ) {
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->postRepository->getLatest();
    }

    public function getPost(PostId $postId): PostModel
    {
        return $this->postRepository->findById($postId);
    }

    public function createPost(PostDto $dto): PostModel
    {
        return DB::transaction(function () use ($dto) {
            $userId = new UserId(Auth::id());
            $model = $this->postRepository->create($userId, $this->processBlocks($dto));

            $tagIds = $dto->tags->pluck('id');

            $model->tags()->sync($tagIds);

            $model->load(['previewImage', 'tags']);

            return $model;
        });
    }

    public function updatePost(PostId $postId, PostDto $dto): PostModel
    {
        return DB::transaction(function () use ($postId, $dto) {
            $model = $this->postRepository->updateById($postId, $this->processBlocks($dto));

            $tagIds = $dto->tags->pluck('id');

            $model->tags()->sync($tagIds);

            $model->load(['previewImage', 'tags']);

            return $model;
        });
    }

    public function changeState(PostId $postId): PostModel
    {
        $model = $this->postRepository->findById($postId);

        $model->is_draft = ! $model->is_draft;
        $model->published_at = Carbon::now();

        $model->save();

        return $model;
    }

    public function deletePost(PostId ...$postId): Collection
    {
        $posts = $this->postRepository->findManyById(...$postId);

        DB::transaction(function () use ($posts) {
            foreach ($posts as $post) {
                $this->postRepository->deleteById(new PostId($post->getKey()));
            }
        });

        return $posts;
    }

    private function processBlocks(PostDto $dto): PostDto
    {
        return new PostDto(
            $dto->title,
            $dto->preview,
            $dto->publishedAt,
            $dto->isDraft,
            $this->blocksRenderer->parse($dto->blocks),
            $dto->previewImageId,
            $dto->previewImageType,
            $dto->tags,
        );
    }
}
