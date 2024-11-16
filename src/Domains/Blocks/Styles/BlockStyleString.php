<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Styles;

use App\Domains\Blocks\Contracts\StyleValueContainer;

readonly class BlockStyleString implements StyleValueContainer
{
    public function __construct(public string $value) {}
}
