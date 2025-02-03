<?php

declare(strict_types=1);

namespace App\Foundation\Context;

use App\Foundation\ValueObjects\AbstractValueObject;

interface Context
{
    /**
     * @template T
     *
     * @param  class-string<T>  $into
     * @return T
     */
    public function resolve(string $into): AbstractValueObject;
}
