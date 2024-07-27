<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Casts;

use App\Domains\Blog\ValueObjects\PostId;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class PostIdCast implements CastsAttributes
{
    /**
     * @return PostId<int>
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): PostId
    {
        return new PostId($attributes[$key] ?? null);
    }

    /**
     * @param  PostId<int>  $value
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): array
    {
        if ($value instanceof PostId) {
            return [$key => $value->value];
        }

        $vo = new PostId($value);
        if ($vo->valid()) {
            return [$key => $vo->value];
        }

        return [];
    }
}
