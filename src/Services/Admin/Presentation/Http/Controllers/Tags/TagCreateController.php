<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Application\Services\TagsPageComposer;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class TagCreateController extends Controller
{
    public function __construct(private readonly TagsPageComposer $service)
    {
    }

    public function __invoke(): View
    {
        return $this->service->create();
    }
}
