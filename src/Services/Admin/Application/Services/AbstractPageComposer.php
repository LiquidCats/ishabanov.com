<?php

declare(strict_types=1);

namespace App\Admin\Application\Services;

use App\Domains\Pages\Services\AbstractPageComposer as BaseAbstractPageComposer;
use Illuminate\Contracts\View\View;

abstract class AbstractPageComposer extends BaseAbstractPageComposer
{
    protected function getView(string $page): View
    {
        return $this->factory->make("admin.pages.{$page}");
    }
}
