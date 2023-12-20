<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Presentation\Http\Requests\TagUpdateRequest;
use App\Admin\Presentation\Http\Resources\TagResource;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\ValueObjects\TagId;
use Illuminate\Routing\Controller;

class TagUpdateController extends Controller
{
    public function __construct(private readonly TagServiceContract $tagService)
    {
    }

    public function __invoke(TagUpdateRequest $request, string $tagId): TagResource
    {
        $model = $this->tagService->update(
            new TagId($tagId),
            $request->validated('name'),
            $request->validated('slug'),
        );

        return TagResource::make($model);
    }
}
