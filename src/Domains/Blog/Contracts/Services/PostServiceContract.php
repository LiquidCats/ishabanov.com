<?php

declare(strict_types=1);

namespace App\Domains\Blog\Contracts\Services;

use App\Data\Database\Eloquent\Models\Post;
use App\Domains\Blog\ValueObjects\PostId;

interface PostServiceContract
{
    public function createPost(array $data): Post;

    /**
     * @param  PostId<int>  $postId
     */
    public function updatePost(PostId $postId, array $data = []): Post;

    /**
     * @param  PostId<int>  $postId
     */
    public function changeState(PostId $postId): Post;

    /**
     * @param  PostId<int>  $postId
     */
    public function deletePost(PostId $postId): bool;
}
