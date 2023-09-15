<?php

declare(strict_types=1);

namespace ishabanov\Foundation\Enums;

enum FeedbackType: int
{
    case NO_SUBJECT = 0;
    case CONSULTATION = 1;
    case SERVICES = 2;
    case PRICING = 3;

    public function getText(): string
    {
        return match ($this) {
            self::NO_SUBJECT => 'I have a question',
            self::CONSULTATION => 'I need consultation',
            self::SERVICES => 'I need a developer',
            self::PRICING => 'What your pricing policy',
        };
    }
}
