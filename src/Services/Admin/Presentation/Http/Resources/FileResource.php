<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Resources;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
        $path = Str::startsWith($this->resource->path, UploadedFilesStorageContract::PATH)
            ? asset('storage/'.$this->resource->path)
            : asset('storage/media/'.$this->resource->path);

        return [
            'hash' => $this->resource->hash,
            'type' => $this->resource->type,
            'path' => $path,
            'extension' => $this->resource->extension,
            'name' => $this->resource->name,
            'file_size' => $this->resource->file_size,
        ];
    }
}
