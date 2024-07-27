<?php

namespace App\Domains\User\ValueObjets;

use App\Foundation\ValueObjects\AbstractValueObject;

/**
 * @template T
 */
readonly class UserId extends AbstractValueObject
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
