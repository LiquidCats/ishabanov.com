<?php

namespace App\Domains\Blog\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Support\Collection;

interface TagRepositoryContract
{
    /**
     * @return Collection<int, Tag>
     */
    public function getAll(): Collection;

    public function create(string $name): Tag;

    /**
     * @param  TagId<int>  $tagId
     */
    public function delete(TagId $tagId): bool;
}
