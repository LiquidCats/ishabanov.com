<?php

declare(strict_types=1);

namespace App\Domains\Pages\Composers;

use App\Domains\Pages\Contracts\ComposerContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

readonly class PagesComposer implements ComposerContract
{
    public function __construct(protected Factory $factory, protected string $path = 'pages')
    {
    }

    public function compose(string $page, array $withData = []): View
    {
        $view = $this->factory->make("{$this->path}.{$page}");

        foreach ($withData as $key => $value) {
            $view = $view->with($key, $value);
        }

        return $view;
    }
}
