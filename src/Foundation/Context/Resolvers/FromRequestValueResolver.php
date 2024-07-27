<?php

declare(strict_types=1);

namespace App\Foundation\Context\Resolvers;

use App\Foundation\Context\ValueResolver;
use App\Foundation\ValueObjects\WithKeyDefinition;
use Illuminate\Http\Request;

readonly class FromRequestValueResolver implements ValueResolver
{
    public function __construct(private Request $request)
    {
    }

    /**
     * @param  WithKeyDefinition  $vo
     */
    public function getValue(string $vo): ?string
    {
        return $this->request->get($vo::asKey());
    }
}
