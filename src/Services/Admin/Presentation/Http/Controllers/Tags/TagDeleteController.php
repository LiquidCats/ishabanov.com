<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Controllers\Tags;

use App\Admin\Presentation\Http\Resources\TagResource;
use App\Domains\Blog\Contracts\Services\TagServiceContract;
use App\Domains\Blog\ValueObjects\TagId;
use App\Foundation\Context\Context;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;

class TagDeleteController extends Controller
{
    public function __construct(
        private readonly Context $context,
        private readonly TagServiceContract $tagService,
    ) {
    }

    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $tagId = $this->context->resolve(TagId::class);
        $models = $this->tagService->delete($tagId);

        return TagResource::collection($models);
    }
}
