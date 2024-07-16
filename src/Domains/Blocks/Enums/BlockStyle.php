<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Enums;

use App\Domains\Blocks\Contracts\StyleEnum;

enum BlockStyle: string implements StyleEnum
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

    public function toStyle(): string
    {
        return match ($this) {
            self::FONT_FAMILY_SANS => 'font-sans',
            self::FONT_FAMILY_SERIF => 'font-serif',
            self::FONT_FAMILY_MONO => 'font-mono',
            //
            self::FONT_SIZE_XS => 'text-xs',
            self::FONT_SIZE_SM => 'text-sm',
            self::FONT_SIZE_BASE => 'text-base',
            self::FONT_SIZE_LG => 'text-lg',
            self::FONT_SIZE_XL => 'text-xl',
            self::FONT_SIZE_XL2 => 'text-2xl',
            self::FONT_SIZE_XL3 => 'text-3xl',
            self::FONT_SIZE_XL4 => 'text-4xl',
            self::FONT_SIZE_XL5 => 'text-5xl',
            self::FONT_SIZE_XL6 => 'text-6xl',
            self::FONT_SIZE_XL7 => 'text-7xl',
            self::FONT_SIZE_XL8 => 'text-8xl',
            //
            self::FONT_WEIGHT_THIN => 'font-thin',
            self::FONT_WEIGHT_EXTRALIGHT => 'font-extralight',
            self::FONT_WEIGHT_LIGHT => 'font-light',
            self::FONT_WEIGHT_NORMAL => 'font-normal',
            self::FONT_WEIGHT_MEDIUM => 'font-medium',
            self::FONT_WEIGHT_SEMIBOLD => 'font-semibold',
            self::FONT_WEIGHT_BOLD => 'font-bold',
            self::FONT_WEIGHT_EXTRABOLD => 'font-extrabold',
            self::FONT_WEIGHT_BLACK => 'font-black',
        };
    }
}
