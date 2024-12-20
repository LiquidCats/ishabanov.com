<?php

declare(strict_types=1);

namespace App\Domains\Blog\Services;

use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\ValueObjects\TagId;
use App\Domains\Blog\ValueObjects\TagSlug;
use App\Domains\User\ValueObjets\UserId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

readonly class TagService implements TagServiceContract
{
    public function create(string $name, ?string $slug): TagModel
    {
        $model = new TagModel;

        $model->name = $name;
        $model->slug = TagSlug::fromString($slug ?? $name);
        $model->created_by = new UserId(Auth::id());
        $model->updated_by = new UserId(Auth::id());

        $model->save();

        return $model;
    }

    /**
     * @throws ValidationException
     */
    public function update(TagId $tagId, string $name, ?string $slug): TagModel|false
    {
        $slugObject = TagSlug::fromString($slug ?: $name);

        $foundBySlug = TagModel::query()
            ->where('slug', '=', $tagId->value)
            ->first($slugObject);

        $foundById = TagModel::query()->findOrFail($tagId);

        if ($foundBySlug !== null && $foundById->getKey() !== $foundBySlug->getKey()) {
            $messages = new MessageBag;
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
        $models = TagModel::query()->findOrFail($tagId);

        DB::transaction(function () use ($models) {
            foreach ($models as $model) {
                $model->delete();
            }
        });

        return $models;
    }

    public function search(string $query = ''): Collection
    {
        if ($query === '') {
            return TagModel::query()
                ->get();
        }

        return TagModel::query()
            ->where(fn (Builder $q) => $q
                ->where('name', 'like', $query.'%')
                ->orWhere('slug', 'like', TagSlug::fromString($query)->value.'%')
            )
            ->get();
    }
}
