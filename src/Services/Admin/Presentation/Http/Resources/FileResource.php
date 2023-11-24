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
class FileResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hash' => $this->resource->hash,
            'type' => $this->resource->type,
            'path' => asset('storage/'.$this->resource->path),
            'extension' => $this->resource->extension,
            'name' => $this->resource->name,
            'file_size' => $this->resource->file_size,
        ];
    }
}
