<?php

declare(strict_types=1);

namespace App\Foundation\ValueObjects;

interface WithRouteDefinition
{
    public static function asRouteParameter(): string;
}
