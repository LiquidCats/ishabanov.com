<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Presentation\Http\Requests\TagStoreRequest;
use App\Admin\Presentation\Http\Resources\TagResource;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use Illuminate\Routing\Controller;

class TagStoreController extends Controller
{
    public function __construct(private readonly TagServiceContract $tagService)
    {
    }

    public function __invoke(TagStoreRequest $request): TagResource
    {
        $tag = $this->tagService->create(
            $request->validated('name'),
            $request->validated('slug'),
        );

        return TagResource::make($tag);
    }
}
