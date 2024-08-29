<?php

declare(strict_types=1);

namespace App\Front\Presentation\Http\Resources;

use App\Data\Database\Eloquent\Models\ToolModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read ToolModel $resource
 */
class ToolResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->resource->id,
            'name' => $this->resource->name,
            'type' => $this->resource->type->value,
            // 'level' => $this->resource->level->value,
        ];
    }
}
