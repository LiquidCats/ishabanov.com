<?php

namespace App\Data\Database\Eloquent\Repositories;

use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TagRepository implements TagRepositoryContract
{
    /**
     * @return Collection<int, Tag>
     */
    public function getAll(): Collection
    {
        return Tag::query()->get();
    }

    public function create(string $name): Tag
    {
        $model = new Tag();

        $model->name = $name;
        $model->slug = Str::of($name)
            ->lower()
            ->slug()
            ->toString();

        return $model;
    }

    public function delete(TagId $tagId): bool
    {
        return Tag::destroy($tagId->value) > 0;
    }
}
