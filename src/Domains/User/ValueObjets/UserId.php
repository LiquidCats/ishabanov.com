<?php

namespace App\Domains\User\ValueObjets;

use App\Foundation\ValueObjects\AbstractValueObject;
use App\Foundation\ValueObjects\Resolvable;

/**
 * @template T
 */
readonly class UserId extends AbstractValueObject
{
    use Resolvable;

    public const AS_KEY = 'user_id';
}
