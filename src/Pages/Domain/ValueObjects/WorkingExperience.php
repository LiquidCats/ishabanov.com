<?php

declare(strict_types=1);

namespace ishabanov\Pages\Domain\ValueObjects;

/**
 * Class WorkingExperience.
 */
class WorkingExperience
{
    public function __construct(
        protected int $years,
        protected int $months
    ) {
    }

    public function getYears(): int
    {
        return $this->years;
    }

    public function getMonths(): int
    {
        return $this->months;
    }
}
