<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function view;

readonly class DashboardViewService implements PageComposerServiceContract
{
    public function view(Request $request): View
    {
        return view('admin.pages.dashboard.index');
    }
}
