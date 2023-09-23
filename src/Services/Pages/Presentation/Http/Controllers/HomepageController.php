<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class HomepageController extends Controller
{
    public function __invoke(PageComposerServiceContract $service): View
    {
        return $service->view();
    }
}
