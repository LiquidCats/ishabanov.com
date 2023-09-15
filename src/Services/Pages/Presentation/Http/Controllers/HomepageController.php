<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;

class HomepageController extends Controller
{
    public function __invoke(PageComposerServiceContract $service): View
    {
        return $service->view();
    }
}
