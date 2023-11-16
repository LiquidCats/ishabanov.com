<?php

declare(strict_types=1);

namespace App\Domains\Pages\Services;

use App\Domains\Pages\Contracts\Services\PageComposerContract;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

abstract class AbstractPageComposer implements PageComposerContract
{
    protected readonly Config $config;

    public function __construct(
        protected readonly Factory $factory,
        Repository $config,
    ) {
        $this->config = Config::fromConfig($config);
    }

    public function compose(string $page, array $withData = []): View
    {
        $view = $this->getView($page);

        foreach ($withData as $key => $value) {
            $view = $view->with($key, $value);
        }

        return $view;
    }

    protected function getView(string $page): View
    {
        return $this->factory->make("themes.{$this->config->theme}.pages.{$page}");
    }
}
