<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Controllers;

use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomepageController extends Controller
{
    public function __construct(private readonly PageComposerServiceContract $service)
    {
    }

    public function __invoke(Request $request): View
    {
        return $this->service->view($request);
    }
}
