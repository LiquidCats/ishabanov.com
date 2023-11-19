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
        private readonly string $text,
        private readonly string $icon,
        private readonly ?string $type = null,
    ) {
    }

    public function render(): View
    {
        return view('admin.components.sidebar-link')
            ->with('link', $this->link)
            ->with('text', $this->text)
            ->with('icon', $this->icon)
            ->with('type', $this->type);
    }
}
