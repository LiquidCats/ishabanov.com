<?php

declare(strict_types=1);

namespace ishabanov\Foundation\Enums;

enum ToolType: string
{
    case DATABASE = 'database';
    case DEPLOY = 'deploy';
    case FRAMEWORK = 'framework';
    case LANGUAGE = 'language';
    case QUEUE = 'queue';
    case TOOL = 'tool';
}
