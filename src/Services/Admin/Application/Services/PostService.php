<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\Enums\PostPreviewType;
use App\Domains\Blog\ValueObjects\PostId;
use App\Foundation\Enums\AllowedTags;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use function filter_var;
use function strip_tags;

readonly class PostService implements PostServiceContract
{
    public function createPost(array $data): PostModel
    {
        $model = new PostModel();

        return $this->saveDataToPost($model, $data);
    }

    public function updatePost(PostId $postId, array $data = []): PostModel
    {
        /** @var PostModel $model */
        $model = PostModel::query()->findOrFail($postId->value);

        return $this->saveDataToPost($model, $data);
    }

    public function changeState(PostId $postId): PostModel
    {
        /** @var PostModel $model */
        $model = PostModel::query()->findOrFail($postId->value);

        $model->is_draft = ! $model->is_draft;

        $model->save();

        return $model;
    }

    public function deletePost(PostId $postId): bool
    {
        return PostModel::destroy($postId->value) > 0;
    }

    private function saveDataToPost(PostModel $model, array $data): PostModel
    {
        $model->title = Arr::get($data, 'title');
        $model->preview = trim(strip_tags(Arr::get($data, 'preview', ''), AllowedTags::toArray()));
        $model->content = trim(strip_tags(Arr::get($data, 'content', ''), AllowedTags::toArray()));
        $model->published_at = Carbon::parse(Arr::get($data, 'published_at'))->startOfMinute();
        $model->is_draft = Arr::exists($data, 'is_draft');

        $previewImageId = (string) Arr::get($data, 'preview_image_id');
        $model->preview_image_id = $previewImageId === 'none' ? null : $previewImageId;

        $previewImageType = (string) Arr::get($data, 'preview_image_type');
        $model->preview_image_type = $previewImageType === 'none' ? null : PostPreviewType::tryFrom($previewImageType);

        $model->save();

        $model->tags()->sync(Arr::get($data, 'post_tags'));

        return $model;
    }
}
