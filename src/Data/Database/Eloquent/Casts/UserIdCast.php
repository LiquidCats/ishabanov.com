<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Casts;

use App\Domains\User\ValueObjets\UserId;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class UserIdCast implements CastsAttributes
{
    /**
     * @return UserId<int>
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): UserId
    {
        return new UserId($attributes[$key] ?? null);
    }

    /**
     * @param  UserId<int>  $value
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): array
    {
        if (($value instanceof UserId) && $value->valid()) {
            return [$key => $value->value];
        }

        $vo = new UserId($value);
        if ($vo->valid()) {
            return [$key => $vo->value];
        }

        return [];
    }
}
