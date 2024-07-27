<?php

declare(strict_types=1);

namespace App\Domains\Blog\Services;

use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\Contracts\Repositories\TagRepositoryContract;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Blog\ValueObjects\TagSlug;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

readonly class TagService implements TagServiceContract
{
    public function __construct(private TagRepositoryContract $tagRepository)
    {
    }

    public function create(string $name, ?string $slug): TagModel
    {
        return $this->tagRepository->create($name, TagSlug::fromString($slug ?: $name));
    }

    /**
     * @throws ValidationException
     */
    public function update(TagId $tagId, string $name, ?string $slug): TagModel|false
    {
        $slugObject = TagSlug::fromString($slug ?: $name);

        $foundBySlug = $this->tagRepository->findBySlug($slugObject);
        $foundById = $this->tagRepository->findById($tagId);

        if ($foundBySlug !== null && $foundById->getKey() !== $foundBySlug->getKey()) {
            $messages = new MessageBag();
            $messages->add('slug', 'The slug has already been taken.');

            throw ValidationException::withMessages($messages->toArray());
        }

        $foundById->name = $name;
        if ($foundById->slug !== (string) $slugObject) {
            $foundById->slug = $slugObject;
        }

        $foundById->save();

        return $foundById;
    }

    public function delete(TagId ...$tagId): Collection
    {
        $models = $this->tagRepository->findManyById(...$tagId);

        DB::transaction(function () use ($models) {
            foreach ($models as $model) {
                $this->tagRepository->removeById(new TagId($model->getKey()));
            }
        });

        return $models;
    }

    public function search(string $query = ''): Collection
    {
        return $this->tagRepository
            ->searchByNameOrSlug($query, TagSlug::fromString($query));
    }
}
