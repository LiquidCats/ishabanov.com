<?php

declare(strict_types=1);

namespace App\Domains\Blog\Contracts\Services;

use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\ValueObjects\TagId;

interface TagServiceContract
{
    public function create(string $name, ?string $slug): Tag;
    public function update(TagId $tagId, string $name, ?string $slug): Tag|false;
    public function delete(TagId $tagId): bool;
}
