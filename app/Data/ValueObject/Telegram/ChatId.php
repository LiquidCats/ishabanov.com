<?php

declare(strict_types=1);

namespace App\Data\ValueObject\Telegram;

/**
 * @template TValue
 */
class ChatId
{
    /**
     * @param TValue $value
     */
    public function __construct(protected mixed $value)
    {
    }

    /**
     * @return TValue
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}
