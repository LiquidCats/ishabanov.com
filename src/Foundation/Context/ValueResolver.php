<?php

declare(strict_types=1);

namespace App\Foundation\Context;

use App\Foundation\ValueObjects\WithKeyDefinition;

interface ValueResolver
{
    /**
     * @param  WithKeyDefinition  $vo
     */
    public function getValue(string $vo): ?string;
}
