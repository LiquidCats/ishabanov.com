<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use App\Admin\Application\Services\DashboardPageComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function __construct(private readonly DashboardPageComposer $service)
    {
    }

    public function __invoke(): View
    {
        return $this->service->dashboard();
    }
}
