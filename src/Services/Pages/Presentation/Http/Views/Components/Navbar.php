<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Views\Components;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

use function route;

class Navbar extends Component
{
    public function __construct(private readonly Repository $config)
    {
    }

    public function render(): View
    {
        return view("themes.{$this->config->get('appearance.theme.site')}.components.navbar", [
            'links' => $this->links(),
            'logo' => $this->config->get('appearance.theme.logo'),
        ]);
    }

    private function links(): Collection
    {
        $currentRouteName = Route::currentRouteName();

        $links = $this->config->get('appearance.links.menu', []);

        return Collection::make($links)
            ->map(fn ($l) => [
                ...$l,
                'link' => route($l['link']),
                'is_active' => $currentRouteName === $l['link'],
            ]);
    }
}
