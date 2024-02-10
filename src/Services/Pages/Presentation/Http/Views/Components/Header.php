<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Views\Components;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

use function asset;
use function route;

class Header extends Component
{
    public function __construct(private readonly Repository $config)
    {
    }

    public function render(): View
    {
        return $this->view('components.header', [
            'links' => $this->links(),
            'logo' => asset($this->config->get('appearance.site.logo')),
        ]);
    }

    private function links(): Collection
    {
        $currentRouteName = Route::currentRouteName();

        $links = $this->config->get('appearance.site.links.menu', []);

        return Collection::make($links)
            ->map(fn ($l) => [
                ...$l,
                'link' => route($l['link']),
                'is_active' => $currentRouteName === $l['link'],
            ]);
    }
}
