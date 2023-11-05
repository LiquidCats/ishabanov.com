<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use function route;
use function view;

class SidebarLink extends Component
{
    public function __construct(
        private readonly string $link,
        private readonly string $name,
        private readonly string $icon,
        private readonly ?string $type = null,
    ) {
    }

    public function render(): View
    {
        return view('admin.components.sidebar-link')
            ->with('sidebarLink', $this->link)
            ->with('sidebarName', $this->name)
            ->with('sidebarIcon', $this->icon)
            ->with('sidebarType', $this->type);
    }
}
