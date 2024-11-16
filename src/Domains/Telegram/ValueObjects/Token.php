<?php

declare(strict_types=1);

namespace App\Domains\Telegram\ValueObjects;

/**
 * @template TValue
 */
class Token
{
    /**
     * @param  TValue  $value
     */
    public function __construct(protected mixed $value) {}

    /**
     * @return TValue
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}
