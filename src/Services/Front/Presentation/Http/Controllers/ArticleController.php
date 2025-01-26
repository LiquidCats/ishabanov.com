<?php

declare(strict_types=1);

namespace App\Front\Presentation\Http\Controllers;

use App\Domains\Blog\Contracts\Services\PostServiceContract;
use App\Domains\Blog\ValueObjects\PostId;
use App\Foundation\Context\Context;
use App\Front\Presentation\Http\Resources\ArticleResource;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;

class ArticleController extends Controller
{
    public function __construct(
        private readonly Context $context,
        private readonly PostServiceContract $service,
    ) {}

    public function __invoke(): ArticleResource
    {
        $post = $this->service->getArticle(
            $this->context->resolve(PostId::class),
        );

        return (new ArticleResource($post['model']))
            ->additional([
                'meta' => [
                    'similar' => ArticleResource::collection($post['similar']),
                    'previous' => $post['previous'] ? ArticleResource::make($post['previous']): null,
                    'next' => $post['next'] ? ArticleResource::make($post['next']) : null,
                ],
            ]);
    }
}
