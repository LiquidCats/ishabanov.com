<?php

namespace App\Domains\Blog\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\ValueObjects\PostId;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Support\Collection;

interface TagRepositoryContract
{
    public function create(string $name): Tag;

    public function search(string $search): Collection;

    public function unlinkFromPost(PostId $postId, TagId $tagId): bool;

    public function linkToPost(PostId $postId, TagId $tagId): bool;
}
