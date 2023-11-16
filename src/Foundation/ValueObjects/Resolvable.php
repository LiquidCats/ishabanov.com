<?php

declare(strict_types=1);

namespace App\Foundation\ValueObjects;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

trait Resolvable
{
    public static function fromRequestRoute(Request $request): static
    {
        return new static($request->route()?->parameter(self::AS_KEY));
    }

    public static function fromRequest(Request $request): static
    {
        return new static($request->get(self::AS_KEY));
    }

    public static function fromRoute(Route $route): static
    {
        return new static($route->parameter(self::AS_KEY));
    }
}
