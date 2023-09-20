<?php

namespace App\Domains\Blog\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\Post as PostModel;
use App\Domains\Blog\Entities\Post;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostRepositoryContract
{
    public function findById(PostId $id): PostModel;
    public function getWithTags(int $page = 1): LengthAwarePaginator;
    public function create(UserId $userId, Post $post): PostModel;
    public function update(PostId $id, Post $post): PostModel;
    public function delete(PostId $id): bool;
}
