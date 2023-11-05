<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Data\Database\Eloquent\Models\Tag;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Blog\ValueObjects\TagSlug;
use Illuminate\Support\Str;

readonly class TagService implements TagServiceContract
{
    public function __construct(private TagRepositoryContract $tagRepository)
    {
    }

    public function create(string $name, ?string $slug): Tag
    {
        return $this->tagRepository->create($name, $slug);
    }

    public function update(TagId $tagId, string $name, ?string $slug): Tag|false
    {
        if ($slug && $this->tagRepository->slugExists(new TagSlug($slug))) {
            return false;
        }

        $tag = $this->tagRepository->findById($tagId);

        $tag->name = $name;
        $tag->slug = $slug ?: Str::of($name)->lower()->slug()->toString();

        $tag->save();

        return $tag;
    }

    public function delete(TagId $tagId): bool
    {
        return $this->tagRepository->removeById($tagId);
    }
}
