<?php

declare(strict_types=1);

namespace App\Domains\Blog\Dto;

use App\Admin\Presentation\Http\Requests\PostStoreRequest;
use App\Admin\Presentation\Http\Requests\PostUpdateRequest;
use App\Domains\Blog\Enums\PostPreviewType;
use Carbon\Carbon;
use Illuminate\Support\Collection;

readonly class PostDto
{
    public function __construct(
        public string $title,
        public string $preview,
        public Carbon $publishedAt,
        public bool $isDraft,
        public Collection $blocks,
        public string $previewImageId,
        public PostPreviewType $previewImageType,
        public Collection $tags,
    ) {
    }

    public static function fromRequest(PostUpdateRequest|PostStoreRequest $request): self
    {
        return new static(
            $request->validated('title'),
            $request->validated('preview'),
            Carbon::parse($request->validated('published_at'))->startOfMinute(),
            (bool) $request->validated('is_draft', true),
            Collection::make($request->validated('blocks', [])),
            $request->validated('preview_image_id'),
            PostPreviewType::tryFrom($request->validated('preview_image_type', '')),
            Collection::make($request->validated('tags', []))
        );
    }
}
