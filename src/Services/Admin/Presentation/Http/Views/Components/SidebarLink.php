<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use function route;
use function view;

class SidebarLink extends Component
{
    public function render(): View
    {
        return view('admin.components.sidebar-link');
    }
}
