<?php

declare(strict_types=1);

namespace ishabanov\Pages\Presentation\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;
use ishabanov\Pages\Domain\Contracts\Services\PageComposerServiceContract;

class HomepageController extends Controller
{
    public function __invoke(PageComposerServiceContract $service): View
    {
        return $service->homepage();
    }
}
