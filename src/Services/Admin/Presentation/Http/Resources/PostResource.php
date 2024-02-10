<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Resources;

use App\Data\Database\Eloquent\Models\PostModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read PostModel $resource
 */
class PostResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'title' => $this->resource->title,
            'preview' => $this->resource->preview,
            'preview_image_type' => $this->resource->preview_image_type,
            'preview_image_id' => $this->resource->preview_image_id,
            'content' => $this->resource->content,
            'is_draft' => $this->resource->is_draft,
            'published_at' => $this->resource->published_at->toDateTimeString('minute'),
            'reading_time' => $this->resource->reading_time,
            //
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'previewImage' => FileResource::make($this->whenLoaded('previewImage')),
        ];
    }
}
