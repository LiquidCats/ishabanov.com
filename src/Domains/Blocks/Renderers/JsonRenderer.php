<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Renderers;

use App\Domains\Blocks\Collections\BlocksCollection;
use Illuminate\Contracts\Support\Arrayable;

class JsonRenderer
{
    public function render(BlocksCollection $blocks): string
    {
        return $blocks
            ->map(fn (Arrayable $b) => $b->toArray())
            ->toJson();
    }
}
