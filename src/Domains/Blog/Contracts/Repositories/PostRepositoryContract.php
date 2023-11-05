<?php

namespace App\Domains\Blog\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\Post;
use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Blog\ValueObjects\TagSlug;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface PostRepositoryContract
{
    /**
     * @param  PostId<int>  $id
     */
    public function findById(PostId $id): Post;

    /**
     * @param  Collection<int, TagSlug>  $tags
     */
    public function getWithTags(Collection $tags = new Collection()): LengthAwarePaginator;

    public function getLatest(): LengthAwarePaginator;

    /**
     * @param  UserId<int>  $userId
     */
    public function create(UserId $userId, Post $post): Post;

    /**
     * @param  PostId<int>  $id
     */
    public function updateById(PostId $id, Post $post): Post;

    /**
     * @param  PostId<int>  $id
     */
    public function deleteById(PostId $id): bool;

    /**
     * @param  PostId<int>  $postId
     */
    public function getPrevious(PostId $postId): ?Post;

    /**
     * @param  PostId<int>  $postId
     */
    public function getNext(PostId $postId): ?Post;

    /**
     * @param  PostId<int>  $postId
     * @param  Collection<int, Tag>  $tags
     * @return Collection<int, Post>
     */
    public function getSimilarByTag(PostId $postId, Collection $tags): Collection;
}
