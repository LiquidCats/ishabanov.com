<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Contracts;

interface StyleEnum
{
    public function toStyle(): string;
}
