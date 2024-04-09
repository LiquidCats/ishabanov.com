<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Contracts\Enums;

use BackedEnum;

interface StyleEnum extends BackedEnum
{
    public function toStyle(): string;
}
