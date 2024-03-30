<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Contracts\Renderers;

use Illuminate\Support\Collection;

interface BlocksRendererContract
{
    public function parse(array $blocks): Collection;
}
