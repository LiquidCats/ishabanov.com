<?php

declare(strict_types=1);

namespace App\Domains\Blog\Contracts\Services;

use App\Data\Database\Eloquent\Models\Post;
use App\Domains\Blog\ValueObjects\PostId;

interface BlogServiceContract
{
    /**
     * @param array $data
     *
     * @return Post
     */
    public function createPost(array $data): Post;

    /**
     * @param PostId<int> $postId
     * @param array  $data
     *
     * @return Post
     */
    public function updatePost(PostId $postId, array $data = []): Post;

    /**
     * @param PostId<int> $postId
     *
     * @return Post
     */
    public function changeState(PostId $postId): Post;

    /**
     * @param PostId<int> $postId
     *
     * @return bool
     */
    public function deletePost(PostId $postId): bool;
}
