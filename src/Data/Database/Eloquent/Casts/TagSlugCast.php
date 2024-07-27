<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Casts;

use App\Domains\Blog\ValueObjects\TagSlug;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

use function sprintf;

class TagSlugCast implements CastsAttributes
{
    /**
     * @return TagSlug<string>
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): TagSlug
    {
        return new TagSlug($attributes['slug'] ?? null);
    }

    /**
     * @param  TagSlug<string>  $value
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): array
    {
        if (! $value instanceof TagSlug) {
            throw new InvalidArgumentException(
                sprintf('The given value must be an instance of [%s]', TagSlug::class)
            );
        }

        return [
            'slug' => $value->value,
        ];
    }
}
