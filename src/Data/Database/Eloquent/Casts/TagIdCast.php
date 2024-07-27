<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Casts;

use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

use function dump;

class TagIdCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): TagId
    {
        return new TagId($attributes[$key] ?? null);
    }

    /**
     * @param  TagId<int>  $value
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): array
    {
        if ($value instanceof TagId) {
            return [$key => $value->value];
        }

        $vo = new TagId($value);
        if ($vo->valid()) {
            return [$key => $vo->value];
        }

        return [];
    }
}
