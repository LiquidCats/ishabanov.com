<?php

namespace App\Domains\Blog\ValueObjects;

/**
 * @template T
 */
readonly class TagSlug
{
    /**
     * @param T $value
     */
    public function __construct(public mixed $value)
    {
    }
}
