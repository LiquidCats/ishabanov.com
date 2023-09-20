<?php

namespace App\Domains\User\ValueObjets;

/**
 * @template T
 */
readonly class UserId
{
    /**
     * @param T $value
     */
    public function __construct(public mixed $value)
    {
    }
}
