<?php

declare(strict_types=1);

namespace App\Domains\Blog\Contracts\Services;

use App\Data\Database\Eloquent\Models\PostModel;
use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface PostServiceContract
{
    public function createPost(array $data): PostModel;

    /**
     * @param  PostId<int>  $postId
     */
    public function updatePost(PostId $postId, array $data = []): PostModel;

    /**
     * @param  PostId<int>  $postId
     */
    public function changeState(PostId $postId): PostModel;

    /**
     * @param  PostId<int>[]  $postId
     * @return Collection<int, PostModel>
     */
    public function deletePost(PostId ...$postId): Collection;

    public function paginate(): LengthAwarePaginator;

    public function getPost(PostId $postId): PostModel;
}
