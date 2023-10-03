<?php

namespace App\Data\Database\Eloquent\Repositories;

use App\Data\Database\Eloquent\Models\Post;
use App\Domains\Blog\Contracts\Repositories\PostRepositoryContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use function now;

class PostRepository implements PostRepositoryContract
{
    public function findById(PostId $id): Post
    {
        return Post::query()
            ->with('tags')
            ->findOrFail($id);
    }

    public function getAll(): LengthAwarePaginator
    {
        return Post::query()
            ->with('tags')
            ->latest()
            ->paginate(perPage: 5);
    }

    public function getWithTags(Collection $tags = new Collection()): LengthAwarePaginator
    {
        return Post::query()
            ->select(['id', 'content', 'title', 'published_at'])
            ->with('tags', fn (BelongsToMany $q) => $q->limit(3))
            // ->where('published_at', '=<', now())
            ->where('is_draft', 0)
            ->when($tags->isNotEmpty(), fn (Builder $q) => $q
                ->whereHas('tags', fn (Builder $q) => $q
                    ->whereIn('slug', $tags)
                )
            )
            ->latest()
            ->paginate(perPage: 5);
    }

    /**
     * @param  UserId<int>  $userId
     */
    public function create(UserId $userId, Post $post): Post
    {
        $post->save();

        return $post;
    }

    /**
     * @param  PostId<int>  $id
     */
    public function update(PostId $id, Post $post): Post
    {
        /** @var Post $model */
        $model = Post::query()
            ->findOrFail($id->value);

        $model->title = $post->title;
        $model->content = $post->content;

        return $model;
    }

    public function delete(PostId $id): bool
    {
        return Post::destroy($id->value) === 1;
    }
}
