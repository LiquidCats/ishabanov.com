<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Presentation\Http\Requests\TagUpdateRequest;
use App\Admin\Presentation\Http\Resources\TagResource;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\ValueObjects\TagId;
use App\Foundation\Context\Context;
use Illuminate\Routing\Controller;

class TagUpdateController extends Controller
{
    public function __construct(
        private readonly Context $context,
        private readonly TagServiceContract $tagService
    ) {}

    public function __invoke(TagUpdateRequest $request): TagResource
    {
        $model = $this->tagService->update(
            $this->context->resolve(TagId::class),
            $request->validated('name'),
            $request->validated('slug'),
        );

        return TagResource::make($model);
    }
}
