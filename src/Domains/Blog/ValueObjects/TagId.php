<?php

namespace App\Domains\Blog\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use App\Foundation\ValueObjects\WithValidation;

readonly class TagId extends AbstractValueObject implements WithValidation
{
    public static function asKey(): string
    {
        return static::makeKeyFromClass(__CLASS__);
    }

    public function valid(): bool
    {
        return (int) (string) $this->value === $this->value;
    }
}
