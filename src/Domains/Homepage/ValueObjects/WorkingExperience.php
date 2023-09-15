<?php

declare(strict_types=1);

namespace App\Domains\Homepage\ValueObjects;

/**
 * Class WorkingExperience.
 */
readonly class WorkingExperience
{
    public function __construct(
        public int $years,
        public int $months
    ) {
    }
}
