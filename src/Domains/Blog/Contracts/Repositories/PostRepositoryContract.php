<?php

namespace App\Domains\Blog\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\Dto\PostDto;
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
    public function findById(PostId $id): PostModel;

    /**
     * @return Collection<int, PostModel>
     */
    public function findManyById(PostId ...$id): Collection;

    /**
     * @param  Collection<int, TagSlug>  $tags
     */
    public function getWithTags(Collection $tags = new Collection()): LengthAwarePaginator;

    public function getLatest(): LengthAwarePaginator;

    /**
     * @param  UserId<int>  $userId
     */
    public function create(UserId $userId, PostDto $dto): PostModel;

    /**
     * @param  PostId<int>  $id
     */
    public function updateById(PostId $id, PostDto $dto): PostModel;

    /**
     * @param  PostId<int>  $id
     */
    public function deleteById(PostId $id): bool;

    /**
     * @param  PostId<int>  $postId
     */
    public function getPrevious(PostId $postId): ?PostModel;

    /**
     * @param  PostId<int>  $postId
     */
    public function getNext(PostId $postId): ?PostModel;

    /**
     * @param  PostId<int>  $postId
     * @param  Collection<int, TagModel>  $tags
     * @return Collection<int, PostModel>
     */
    public function getSimilarByTag(PostId $postId, Collection $tags): Collection;
}
