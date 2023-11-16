<?php

namespace App\Domains\Pages\Contracts\Services;

use Illuminate\Contracts\View\View;

interface PageComposerContract
{
    public function compose(string $page, array $withData = []): View;
}
