<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\Post;
use App\Domains\Blog\Contracts\Services\BlogServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class BlogService implements BlogServiceContract
{
    public function createPost(array $data): Post
    {
        $model = new Post();

        return $this->saveDataToPost($model, $data);
    }

    public function updatePost(PostId $postId, array $data = []): Post
    {
        /** @var Post $model */
        $model = Post::query()->findOrFail($postId->value);

        return $this->saveDataToPost($model, $data);
    }

    public function changeState(PostId $postId): Post
    {
        /** @var Post $model */
        $model = Post::query()->findOrFail($postId->value);

        $model->is_draft = ! $model->is_draft;

        $model->save();

        return $model;
    }

    public function deletePost(PostId $postId): bool
    {
        return Post::destroy($postId->value) > 0;
    }

    private function saveDataToPost(Post $model, array $data): Post
    {
        $model->title = Arr::get($data, 'title');
        $model->content = Arr::get($data, 'content');
        $model->published_at = Carbon::parse(Arr::get($data, 'published_at'))->startOfMinute();
        $model->is_draft = Arr::exists($data, 'is_draft');

        $model->save();

        $model->tags()->sync(Arr::get($data, 'post_tags'));

        return $model;
    }
}
