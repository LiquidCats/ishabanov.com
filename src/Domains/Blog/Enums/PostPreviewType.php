<?php

declare(strict_types=1);

namespace App\Domains\Blog\Enums;

enum PostPreviewType: string
{
    case LEFT_SIDE = 'left_side';
    case FILL = 'fill';

    public function toText(): string
    {
        return match ($this) {
            self::LEFT_SIDE => 'Small preview on the left side',
            self::FILL => 'Preview as a background',
        };
    }
}
