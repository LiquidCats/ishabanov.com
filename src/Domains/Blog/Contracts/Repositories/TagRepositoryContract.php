<?php

namespace App\Domains\Blog\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Blog\ValueObjects\TagSlug;
use Illuminate\Support\Collection;

interface TagRepositoryContract
{
    /**
     * @return Collection<int, Tag>
     */
    public function getAll(): Collection;
    public function getAllWithPostsCount(): Collection;

    public function create(string $name, ?string $slug): Tag;
    public function findById(TagId $tagId): Tag;
    public function updateById(TagId $tagId, string $name, ?string $slug): Tag;
    public function slugExists(TagSlug $slug): bool;
    /**
     * @param  TagId<int>  $tagId
     */
    public function removeById(TagId $tagId): bool;
}
