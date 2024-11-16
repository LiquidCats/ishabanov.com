<?php

declare(strict_types=1);

namespace App\Data\Filesystem\Storage;

readonly class Options
{
    public function __construct(
        public string $prepend,
        public string $path,
    ) {}
}
