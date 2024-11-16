<?php

declare(strict_types=1);

namespace App\Front\Presentation\Http\Resources;

use App\Data\Database\Eloquent\Models\ExperienceModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function json_decode;

/**
 * @property-read ExperienceModel $resource
 */
class ExperienceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'company_url' => $this->resource->company_url,
            'company_logo' => $this->resource->company_logo,
            'position' => $this->resource->position,
            'company_name' => $this->resource->company_name,
            'tools' => ToolResource::collection($this->resource->tools),
            'description' => json_decode($this->resource->description, true, 512, JSON_THROW_ON_ERROR),
            'started_at' => $this->resource->started_at?->toDateTimeString(),
            'ended_at' => $this->resource->ended_at?->toDateTimeString(),
        ];
    }
}
