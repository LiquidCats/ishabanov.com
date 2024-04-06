<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Contracts\Renderers;

use App\Domains\Blocks\Collections\BlocksCollection;
use Illuminate\Support\Collection;

interface BlocksRendererContract
{
    public function parse(Collection $blocks): BlocksCollection;
}
