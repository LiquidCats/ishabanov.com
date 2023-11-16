<?php

namespace App\Domains\Blog\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Blog\ValueObjects\TagSlug;
use Illuminate\Support\Collection;

interface TagRepositoryContract
{
    /**
     * @return Collection<int, TagModel>
     */
    public function getAll(): Collection;
    public function getAllWithPostsCount(): Collection;

    public function create(string $name, ?string $slug): TagModel;
    public function findById(TagId $tagId): TagModel;
    public function updateById(TagId $tagId, string $name, ?string $slug): TagModel;
    public function slugExists(TagSlug $slug): bool;
    /**
     * @param  TagId<int>  $tagId
     */
    public function removeById(TagId $tagId): bool;
}
