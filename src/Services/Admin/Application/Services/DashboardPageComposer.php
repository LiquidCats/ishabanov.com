<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use Illuminate\Contracts\View\View;
use function view;

class DashboardPageComposer extends AbstractPageComposer
{
    public function dashboard(): View
    {
        return $this->compose('dashboard.index');
    }
}
