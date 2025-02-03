<?php

declare(strict_types=1);

namespace App\Foundation\Context;

use App\Foundation\Exceptions\Context\UnresolvableContextParameter;
use App\Foundation\ValueObjects\AbstractValueObject;
use App\Foundation\ValueObjects\WithKeyDefinition;

readonly class ContextProvider implements Context
{
    public function __construct(private ValueResolver $pool) {}

    /**
     * @template T
     *
     * @param  class-string<T>  $into
     * @return T
     */
    public function resolve(string $into): AbstractValueObject
    {
        if (! class_exists($into)) {
            throw new UnresolvableContextParameter($into);
        }

        if (! is_subclass_of($into, WithKeyDefinition::class)) {
            throw new UnresolvableContextParameter($into);
        }

        $value = $this->pool->getValue($into);

        return new $into($value);
    }
}
