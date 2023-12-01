<?php

namespace App\Domains\Blog\ValueObjects;

use App\Foundation\ValueObjects\AbstractValueObject;
use App\Foundation\ValueObjects\Resolvable;

readonly class PostId extends AbstractValueObject
{
    use Resolvable;

    public const AS_KEY = 'post_id';
    public const AS_ROUTE_PARAMETER = '{post_id}';
}
