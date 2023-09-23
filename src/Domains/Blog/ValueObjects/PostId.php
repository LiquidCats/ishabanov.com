<?php

namespace App\Domains\Blog\ValueObjects;

/**
 * @template T
 */
readonly class PostId
{
    /**
     * @param  T  $value
     */
    public function __construct(public mixed $value)
    {

    }
}
