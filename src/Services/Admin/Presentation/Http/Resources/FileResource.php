<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Resources;

use App\Data\Database\Eloquent\Models\FileModel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read FileModel $resource
 */
class FileResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hash' => $this->resource->hash->value,
            'type' => $this->resource->type,
            'path' => $this->resource?->getFileUrl(),
            'extension' => $this->resource->extension,
            'name' => $this->resource->name,
            'file_size' => $this->resource->file_size,
        ];
    }
}
