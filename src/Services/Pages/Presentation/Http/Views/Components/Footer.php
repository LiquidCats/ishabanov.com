<?php

declare(strict_types=1);

namespace App\Pages\Presentation\Http\Views\Components;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use function asset;
use function route;

class Footer extends Component
{
    public function __construct(private readonly Repository $config)
    {
    }

    public function render(): View
    {
        return view("themes.{$this->config->get('appearance.site.theme')}.components.footer", [
            'links' => $this->links(),
            'socials' => $this->socials(),
            'logo' => asset($this->config->get('appearance.site.logo')),
        ]);
    }

    private function socials(): Collection
    {
        $links = $this->config->get('appearance.site.links.socials', []);

        return Collection::make($links);
    }

    private function links(): Collection
    {
        $links = $this->config->get('appearance.site.links.menu', []);

        return Collection::make($links)
            ->map(fn ($l) => [...$l, 'link' => route($l['link'])]);
    }
}
