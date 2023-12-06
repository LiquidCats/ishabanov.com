<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Resources;

use App\Data\Database\Eloquent\Models\FileModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function asset;

/**
 * @property-read FileModel $resource
 */
class EditorImageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'value' => asset('storage/'.$this->resource->path),
            'title' => $this->resource->name,
        ];
    }
}
