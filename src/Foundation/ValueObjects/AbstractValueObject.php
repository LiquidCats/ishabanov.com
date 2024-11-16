<?php

declare(strict_types=1);

namespace App\Foundation\ValueObjects;

use Illuminate\Support\Str;
use Stringable;

use function sprintf;

/**
 * @template T
 */
abstract readonly class AbstractValueObject implements Stringable, WithKeyDefinition, WithRouteDefinition
{
    /**
     * @param  T  $value
     */
    public function __construct(public mixed $value) {}

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function equals(AbstractValueObject $vo): bool
    {
        return $this->value === $vo->value;
    }

    public static function asRouteParameter(): string
    {
        return sprintf('{%s}', static::asKey());
    }

    protected static function makeKeyFromClass($class): string
    {
        return Str::of($class)
            ->classBasename()
            ->snake()
            ->value();
    }
}
