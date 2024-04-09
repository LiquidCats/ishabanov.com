<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Enums;

enum HeadingTag: string
{
    case H1 = 'h1';
    case H2 = 'h2';
    case H3 = 'h3';
    case H4 = 'h4';
    case H5 = 'h5';
    case H6 = 'h6';
}
