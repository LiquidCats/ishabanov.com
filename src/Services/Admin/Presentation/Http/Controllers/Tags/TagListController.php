<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Presentation\Http\Resources\TagResource;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class TagListController extends Controller
{
    public function __construct(private readonly TagServiceContract $service) {}

    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $tags = $this->service->search($request->get('q', '') ?? '');

        return TagResource::collection($tags);
    }
}
