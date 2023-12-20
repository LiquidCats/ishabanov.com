<?php

declare(strict_types=1);

namespace App\Domains\Blog\Contracts\Services;

use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Support\Collection;

interface TagServiceContract
{
    public function create(string $name, ?string $slug): TagModel;

    public function update(TagId $tagId, string $name, ?string $slug): TagModel|false;

    public function delete(TagId ...$tagId): Collection;

    /**
     * @return Collection<int, TagModel>
     */
    public function search(string $query = ''): Collection;
}
