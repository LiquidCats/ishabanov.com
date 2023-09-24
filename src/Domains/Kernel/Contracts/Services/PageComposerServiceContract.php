<?php

namespace App\Domains\Kernel\Contracts\Services;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

interface PageComposerServiceContract
{
    public function view(Request $request): View;
}
