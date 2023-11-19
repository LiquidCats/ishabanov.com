<?php

declare(strict_types=1);

namespace App\Domains\Files\Enums;

enum AllowedTypes: string
{
    case IMAGE_JPG = 'image/jpg';
    case IMAGE_JPEG = 'image/jpeg';
    case IMAGE_BMP = 'image/bmp';
    case IMAGE_PNG = 'image/png';
    case IMAGE_SVG = 'image/svg+xml';

    public static function images(): array
    {
        return [
            self::IMAGE_JPG,
            self::IMAGE_JPEG,
            self::IMAGE_BMP,
            self::IMAGE_PNG,
            self::IMAGE_SVG,
        ];
    }

    public function toString(): string
    {
        return $this->value;
    }
}
