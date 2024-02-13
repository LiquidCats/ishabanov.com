<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use function view;

class SidebarLink extends Component
{
    public function render(): View
    {
        return view('views.components.sidebar-link');
    }
}
