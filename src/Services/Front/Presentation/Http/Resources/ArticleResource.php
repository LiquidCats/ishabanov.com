<?php

declare(strict_types=1);

namespace App\Front\Presentation\Http\Resources;

use App\Admin\Presentation\Http\Resources\FileResource;
use App\Admin\Presentation\Http\Resources\TagResource;
use App\Data\Database\Eloquent\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read PostModel $resource
 */
class ArticleResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id->value,
            'title' => $this->resource->title,
            'preview' => $this->resource->preview,
            'is_draft' => $this->resource->is_draft,
            'published_at' => $this->resource->published_at?->toDateTimeString(),
            'reading_time' => $this->resource->reading_time,
            'preview_image_type' => $this->resource->preview_image_type?->value,
            'preview_image_id' => $this->resource->preview_image_id?->value,
            'created_at' => $this->resource->created_at?->toDateTimeString(),
            'updated_at' => $this->resource->updated_at?->toDateTimeString(),
            'created_by' => $this->resource->created_by?->value,
            'updated_by' => $this->resource->updated_by?->value,
            'blocks' => $this->resource->blocks?->toArray() ?? [],
            //
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'previewImage' => FileResource::make($this->whenLoaded('previewImage')),
        ];
    }
}
