<?php

declare(strict_types=1);

namespace App\Domains\Files\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\File;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;

interface FileRepositoryContract
{
    public function create(UploadedFile $file, string $filepath, string $name): File;
    public function findById(FileId $fileId): File;
    public function removeById(FileId $fileId): bool;
    public function getAllPaginated(): LengthAwarePaginator;
}
