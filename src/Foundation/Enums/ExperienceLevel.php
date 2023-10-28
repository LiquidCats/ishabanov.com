<?php

declare(strict_types=1);

namespace App\Foundation\Enums;

enum ExperienceLevel: int
{
    case JUNIOR = 0;
    case MIDDLE = 1;
    case SENIOR = 2;

    public function getText(): string
    {
        return match ($this) {
            self::JUNIOR => 'Junior',
            self::MIDDLE => 'Middle',
            self::SENIOR => 'Senior',
        };
    }
}
