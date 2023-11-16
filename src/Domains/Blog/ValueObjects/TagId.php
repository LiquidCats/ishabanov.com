<?php

namespace App\Domains\Blog\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use App\Foundation\ValueObjects\Resolvable;

readonly class TagId extends AbstractValueObject
{
    use Resolvable;

    public const AS_KEY = 'tag_id';
}
