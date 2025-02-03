<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Casts;

use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class FileIdCast implements CastsAttributes
{
    /**
     * @return FileId<string>
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): FileId
    {
        return new FileId($attributes[$key] ?? null);
    }

    /**
     * @param  FileId<string>  $value
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): array
    {
        if (($value instanceof FileId) && $value->valid()) {
            return [$key => $value->value];
        }

        $vo = new FileId($value);
        if ($vo->valid()) {
            return [$key => $vo->value];
        }

        return [];
    }
}
