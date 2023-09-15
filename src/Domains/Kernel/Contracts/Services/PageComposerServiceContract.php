<?php

namespace App\Domains\Kernel\Contracts\Services;

use Illuminate\Contracts\View\View;

interface PageComposerServiceContract
{
    public function view(): View;
}
