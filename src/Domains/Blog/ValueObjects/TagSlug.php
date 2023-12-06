<?php

namespace App\Domains\Blog\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use Illuminate\Support\Str;

readonly class TagSlug extends AbstractValueObject
{
    public static function fromString(string $str): static
    {
        return new static(Str::of($str)->lower()->slug()->toString());
    }
}
