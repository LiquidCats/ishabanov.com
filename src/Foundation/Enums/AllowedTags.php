<?php

declare(strict_types=1);

namespace App\Foundation\Enums;

use function array_map;
use function strip_tags;
use function trim;

enum AllowedTags: string
{
    case TAG_P = 'p';
    case TAG_A = 'a';
    case TAG_I = 'i';
    case TAG_B = 'b';
    case TAG_STRONG = 'strong';
    case TAG_HR = 'hr';
    case TAG_BR = 'br';
    case TAG_H1 = 'h1';
    case TAG_H2 = 'h2';
    case TAG_H3 = 'h3';
    case TAG_H4 = 'h4';
    case TAG_H5 = 'h5';
    case TAG_H6 = 'h6';
    case TAG_SUB = 'sub';
    case TAG_SUP = 'sup';
    case TAG_CODE = 'code';
    case TAG_SPUN = 'span';
    case TAG_S = 's';
    // LISTS
    case TAG_UL = 'ul';
    case TAG_OL = 'ol';
    case TAG_DL = 'dl';
    case TAG_DT = 'dt';
    case TAG_DD = 'dd';
    case TAG_LI = 'li';
    // TABLES
    case TAG_TABLE = 'table';
    case TAG_TR = 'tr';
    case TAG_TH = 'th';
    case TAG_TD = 'td';
    case TAG_TBODY = 'tbody';
    case TAG_THEAD = 'thead';
    case TAG_TFOOT = 'tfoot';
    case TAG_COLGROUP = 'colgroup';
    case TAG_CAPTION = 'caption';
    // IMAGES
    case TAG_IMG = 'img';
    case TAG_FIGURE = 'figure';
    case TAG_FIGCAPTION = 'figcaption';

    public static function toArray(): array
    {
        return array_map(callback: static fn (AllowedTags $a) => $a->value, array: self::cases());
    }

    public static function sanitize(string $s): string
    {
        $allowedTags = self::toArray();

        return trim(strip_tags($s, $allowedTags));
    }
}
