<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Containers;

use App\Domains\Blocks\Contracts\StyleEnum;

readonly class StyleStringContainer implements StyleEnum
{
    public function __construct(public string $value)
    {
    }

    public function toStyle(): string
    {
        return $this->value;
    }
}
