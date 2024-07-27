<?php

declare(strict_types=1);

namespace App\Domains\Files\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use App\Foundation\ValueObjects\WithValidation;
use function is_string;

readonly class FileId extends AbstractValueObject implements WithValidation
{
    public static function asKey(): string
    {
        return static::makeKeyFromClass(__CLASS__);
    }

    public function valid(): bool
    {
        return is_string($this->value);
    }
}
