<?php

namespace App\Domains\Pages\Contracts;

use Illuminate\Contracts\View\View;

interface ComposerContract
{
    public function compose(string $page, array $withData = []): View;
}
