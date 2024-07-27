<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Resources;

use App\Data\Database\Eloquent\Models\TagModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read TagModel $resource
 */
class TagResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id->value,
            'name' => $this->resource->name,
            'slug' => $this->resource->slug->value,
            'posts_count' => $this->whenCounted('posts'),
            'posts' => PostResource::collection($this->whenLoaded('posts')),
        ];
    }
}
