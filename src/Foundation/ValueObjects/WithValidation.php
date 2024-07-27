<?php

declare(strict_types=1);

namespace App\Foundation\ValueObjects;

interface WithValidation
{
    public function valid(): bool;
}
