<?php

namespace ishabanov\Pages\Domain\Contracts\Services;

use Illuminate\Contracts\View\View;

interface PageComposerServiceContract
{
    public function homepage(): View;
}
