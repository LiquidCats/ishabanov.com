<?php

declare(strict_types=1);

namespace App\Domains\Blog\Dto;

use App\Admin\Presentation\Http\Requests\PostStoreRequest;
use App\Admin\Presentation\Http\Requests\PostUpdateRequest;
use App\Domains\Blog\Enums\PostPreviewType;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ArrayShape;

readonly class PostDto
{
    public function __construct(
        public string $title,
        public string $preview,
        public Carbon $publishedAt,
        public bool $isDraft,
        public Collection $blocks,
        public ?string $previewImageId,
        public ?PostPreviewType $previewImageType,
        public Collection $tags,
    ) {}

    public static function fromArray(#[ArrayShape([
        'title' => 'string',
        'preview' => 'string',
        'published_at' => 'string',
        'is_draft' => 'bool',
        'blocks' => 'array',
        'preview_image_id' => 'string',
        'preview_image_type' => 'string',
        'tags' => 'array',
    ])] array $data): self
    {
        return new static(
            $data['title'] ?? '',
            $data['preview'] ?? '',
            Carbon::parse($data['published_at']),
            (bool) $data['is_draft'],
            Collection::make($data['blocks'] ?? []),
            $data['preview_image_id'],
            PostPreviewType::tryFrom($data['preview_image_type'] ?? ''),
            Collection::make($data['tags']),
        );
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
            PostPreviewType::tryFrom($request->validated('preview_image_type') ?: ''),
            Collection::make($request->validated('tags', []))
        );
    }
}
