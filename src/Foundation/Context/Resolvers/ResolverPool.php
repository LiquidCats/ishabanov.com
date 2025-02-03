<?php

declare(strict_types=1);

namespace App\Foundation\Context\Resolvers;

use App\Foundation\Context\ValueResolver;
use App\Foundation\Exceptions\Context\ValueNotInContext;

readonly class ResolverPool implements ValueResolver
{
    /** @var ValueResolver[] */
    private array $pool;

    public function __construct(ValueResolver ...$valueResolver)
    {
        $this->pool = $valueResolver;
    }

    public function getValue(string $vo): ?string
    {
        foreach ($this->pool as $resolver) {
            $value = $resolver->getValue($vo);
            if ($value !== null) {
                return $value;
            }
        }

        throw new ValueNotInContext;
    }
}
