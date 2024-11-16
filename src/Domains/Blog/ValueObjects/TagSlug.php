<?php

namespace App\Domains\Blog\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use App\Foundation\ValueObjects\WithValidation;
use Illuminate\Support\Str;

use function is_string;

readonly class TagSlug extends AbstractValueObject implements WithValidation
{
    public static function fromString(string $str): static
    {
        return new static(
            Str::of($str)
                ->lower()
                ->slug()
                ->trim()
                ->value()
        );
    }

    public static function asKey(): string
    {
        return static::makeKeyFromClass(__CLASS__);
    }

    public function valid(): bool
    {
        return is_string($this->value);
    }
}
