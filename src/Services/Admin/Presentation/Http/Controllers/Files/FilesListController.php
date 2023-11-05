<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Admin\Application\Services\FilesListViewService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FilesListController extends Controller
{
    public function __construct(private readonly FilesListViewService $service)
    {
    }

    public function __invoke(Request $request): View
    {
        return $this->service->view($request);
    }
}
