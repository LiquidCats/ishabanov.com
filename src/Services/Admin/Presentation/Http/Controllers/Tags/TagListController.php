<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Application\Services\TagsPageComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TagListController extends Controller
{
    public function __construct(private readonly TagsPageComposer $service)
    {
    }

    public function __invoke(Request $request): View
    {
        return $this->service->list();
    }
}
