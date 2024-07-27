<?php

declare(strict_types=1);

namespace App\Foundation\ValueObjects;

interface WithKeyDefinition
{
    public static function asKey(): string;
}
