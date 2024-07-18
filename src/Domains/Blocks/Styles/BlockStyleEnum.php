<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Styles;

use App\Domains\Blocks\Contracts\StyleValueContainer;

enum BlockStyleEnum: string implements StyleValueContainer
{
    // font family
    case FONT_FAMILY_SANS = 'sans';
    case FONT_FAMILY_SERIF = 'serif';
    case FONT_FAMILY_MONO = 'mono';
    // font size
    case FONT_SIZE_XS = 'xs';
    case FONT_SIZE_SM = 'sm';
    case FONT_SIZE_BASE = 'base';
    case FONT_SIZE_LG = 'lg';
    case FONT_SIZE_XL = 'xl';
    case FONT_SIZE_XL2 = '2xl';
    case FONT_SIZE_XL3 = '3xl';
    case FONT_SIZE_XL4 = '4xl';
    case FONT_SIZE_XL5 = '5xl';
    case FONT_SIZE_XL6 = '6xl';
    case FONT_SIZE_XL7 = '7xl';
    case FONT_SIZE_XL8 = '8xl';
    // font weight
    case FONT_WEIGHT_THIN = 'thin';
    case FONT_WEIGHT_EXTRALIGHT = 'extralight';
    case FONT_WEIGHT_LIGHT = 'light';
    case FONT_WEIGHT_NORMAL = 'normal';
    case FONT_WEIGHT_MEDIUM = 'medium';
    case FONT_WEIGHT_SEMIBOLD = 'semibold';
    case FONT_WEIGHT_BOLD = 'bold';
    case FONT_WEIGHT_EXTRABOLD = 'extrabold';
    case FONT_WEIGHT_BLACK = 'black';
}
