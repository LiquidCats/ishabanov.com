<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Contracts\Enums;

interface StyleEnum
{
    public function toStyle(): string;
}
