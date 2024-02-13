<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Views\Components;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Router;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;
use Illuminate\View\Component;

use function route;
use function view;

class Sidebar extends Component
{
    public function __construct(private readonly Repository $config, private readonly Router $router)
    {
    }

    public function render(): View
    {
        return view('views.components.sidebar')
            ->with('sidebarLinks', $this->links());
    }

    private function links(): Collection
    {

        return Collection::make($this->config->get('appearance.admin.links.menu', []))
            ->map(function (array $l) {
                if (! $l) {
                    return [];
                }

                $link = $this->router->has($l['link'])
                    ? route($l['link'])
                    : $l['link'];

                return new Fluent([
                    ...$l, 'link' => $link,
                ]);
            });
    }
}
