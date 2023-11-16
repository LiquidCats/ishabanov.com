<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use function redirect;
use function route;

class TagDeleteController extends Controller
{
    public function __construct(private readonly TagServiceContract $tagService)
    {
    }

    public function __invoke(Request $request): RedirectResponse
    {
        $this->tagService->delete(TagId::fromRequestRoute($request));

        return redirect(route('admin.tags.list'));
    }
}
