<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\User\ValueObjets\UserId;
use App\Foundation\Enums\AllowedTags;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function strip_tags;
use function trim;

readonly class PostService implements PostServiceContract
{
    public function __construct(private PostRepositoryContract $postRepository)
    {
    }

    public function paginate(): LengthAwarePaginator
    {
        return $this->postRepository->getLatest();
    }

    public function getPost(PostId $postId): PostModel
    {
        return $this->postRepository->findById($postId);
    }

    public function createPost(array $data): PostModel
    {
        return DB::transaction(function () use ($data) {
            $userId = new UserId(Auth::id());
            $dto = $this->createFromData($data);
            $model = $this->postRepository->create($userId, $dto);

            $tags = Arr::get($data, 'tags', []);
            $tagIds = Collection::make($tags)
                ->pluck('id');

            $model->tags()->sync($tagIds);

            $model->load(['previewImage', 'tags']);

            return $model;
        });
    }

    public function updatePost(PostId $postId, array $data = []): PostModel
    {
        return DB::transaction(function () use ($postId, $data) {
            $dto = $this->createFromData($data);
            $model = $this->postRepository->updateById($postId, $dto);

            $tags = Arr::get($data, 'tags', []);
            $tagIds = Collection::make($tags)
                ->pluck('id');

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

    private function createFromData(array $data): PostModel
    {
        $model = new PostModel();

        $model->title = Arr::get($data, 'title');
        $model->preview = $this->sanitizeHtml($data, 'preview');
        $model->content = $this->sanitizeHtml($data, 'content');
        $model->published_at = Carbon::parse(Arr::get($data, 'published_at'))->startOfMinute();
        $model->is_draft = Arr::get($data, 'is_draft', true);

        $previewImageId = Arr::get($data, 'preview_image_id');
        $model->preview_image_id = $previewImageId;

        $previewImageType = Arr::get($data, 'preview_image_type');
        $model->preview_image_type = $previewImageType;

        return $model;
    }

    private function sanitizeHtml(array $data, string $key): string
    {
        $allowedTags = AllowedTags::toArray();
        $html = Arr::get($data, $key, '');

        return trim(strip_tags($html, $allowedTags));
    }
}
