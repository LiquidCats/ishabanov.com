<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Domains\Kernel\Contracts\Services\PageComposerServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use function view;

class TagCreateController extends Controller
{
    public function __construct(private readonly PageComposerServiceContract $service)
    {
    }

    public function __invoke(Request $request): View
    {
        return $this->service->view($request);
    }
}
