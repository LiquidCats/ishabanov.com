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
class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id->value,
            'title' => $this->resource->title,
            'preview' => $this->resource->preview,
            'reading_time' => $this->resource->reading_time,
            'preview_image_type' => $this->resource->preview_image_type?->value,
            'published_at' => $this->resource->published_at?->toDateTimeString('minute'),

            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'previewImage' => FileResource::make($this->whenLoaded('previewImage')),
        ];
    }
}
