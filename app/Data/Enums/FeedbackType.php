<?php

declare(strict_types=1);

namespace App\Data\Enums;

enum FeedbackType: int
{
    case CONSULTATION = 0;
    case SERVICES = 1;
    case PRICING = 2;
    case COSTS = 3;
}
