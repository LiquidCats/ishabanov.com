<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Files;

use App\Admin\Application\Services\FilesPageComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class FilesListController extends Controller
{
    public function __construct(private readonly FilesPageComposer $service)
    {
    }

    public function __invoke(): View
    {
        return $this->service->list();
    }
}
