<?php

declare(strict_types=1);

namespace App\Foundation\ValueObjects;

use Stringable;

/**
 * @template T
 */
abstract readonly class AbstractValueObject implements Stringable
{
    /**
     * @param  T  $value
     */
    public function __construct(public mixed $value)
    {
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}
