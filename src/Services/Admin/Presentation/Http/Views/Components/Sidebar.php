<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use function route;
use function view;

class Sidebar extends Component
{
    public function render(): View
    {
        return view('admin.components.sidebar')
            ->with('sidebarLinks', static::links());
    }

    public static function links(): array
    {
        return [
            [
                'link' => route('admin.dashboard'),
                'name' => 'Dashboard',
                'icon' => 'clipboard-data-fill',
            ],
            [
                'link' => route('admin.posts.list'),
                'name' => 'Posts',
                'icon' => 'postcard-fill',
            ],
            [
                'link' => route('admin.tags.list'),
                'name' => 'Tags',
                'icon' => 'tags-fill',
            ],
            [
                'link' => route('admin.files.list'),
                'name' => 'Files',
                'icon' => 'file-earmark-image-fill',
            ],
            [
                'link' => '#',
                'name' => 'Users',
                'icon' => 'people-fill',
            ],
            [],
            [
                'link' => '#',
                'name' => 'Settings',
                'icon' => 'sliders',
            ],
            [],
            [
                'link' => route('auth.logout'),
                'name' => 'Sign Out',
                'icon' => 'power',
                'type' => 'danger',
            ],
        ];
    }
}
