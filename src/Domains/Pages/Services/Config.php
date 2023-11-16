<?php

declare(strict_types=1);

namespace App\Domains\Pages\Services;

use Illuminate\Contracts\Config\Repository;

readonly class Config
{
    public function __construct(public string $theme)
    {
    }

    public static function fromConfig(Repository $repository): static
    {
        return new static(
            $repository->get('appearance.theme.site', 'default')
        );
    }
}
