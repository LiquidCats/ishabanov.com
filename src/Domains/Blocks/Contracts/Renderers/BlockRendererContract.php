<?php

declare(strict_types=1);

namespace App\Domains\Blocks\Contracts\Renderers;

use App\Domains\Blocks\Enums\BlockType;
use Illuminate\Contracts\View\View;

interface BlockRendererContract
{
    public function render(): View;

    public static function createAs(BlockType $type, array $data): self;
}
