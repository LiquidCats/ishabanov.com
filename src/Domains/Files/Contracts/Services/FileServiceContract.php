<?php

declare(strict_types=1);

namespace App\Domains\Files\Contracts\Services;

use App\Data\Database\Eloquent\Models\File;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Http\UploadedFile;

interface FileServiceContract
{
    public function store(UploadedFile $file, string $name): ?File;
    public function drop(FileId $fileId): bool;
}
