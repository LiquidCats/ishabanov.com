<?php

declare(strict_types=1);

namespace App\Domains\Blog\Enums;

enum PostPreviewType: string
{
    case LEFT_SIDE = 'left_side';
    case FILL = 'fill';
}
