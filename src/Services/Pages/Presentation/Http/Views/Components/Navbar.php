<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use function route;


class Navbar extends Component
{
    public function render(): View
    {

        return view('components.navbar', ['links' => $this->links()]);
    }

    private function links(): array
    {
        $currentRouteName = Route::currentRouteName();
        return [
            [
                'name' => 'Home',
                'link' => route('pages.home'),
                'is_active' => $currentRouteName === 'pages.home',
            ],
            [
                'name' => 'Blog',
                'link' => route('pages.blog'),
                'is_active' => $currentRouteName === 'pages.blog',
            ],
        ];
    }
}
