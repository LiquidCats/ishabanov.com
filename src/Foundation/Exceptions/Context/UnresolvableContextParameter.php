<?php

declare(strict_types=1);

namespace App\Foundation\Exceptions\Context;

use RuntimeException;

class UnresolvableContextParameter extends RuntimeException
{
    public function __construct(string $class)
    {
        parent::__construct("cant resolve context parameter into {$class}");
    }
}
