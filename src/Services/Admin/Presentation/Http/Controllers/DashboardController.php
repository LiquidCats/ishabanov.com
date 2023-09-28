<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers;

use Illuminate\Routing\Controller;
use function view;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.pages.dashboard.index');
    }
}
