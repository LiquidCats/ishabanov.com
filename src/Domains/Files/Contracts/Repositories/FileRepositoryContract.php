<?php

declare(strict_types=1);

namespace App\Domains\Files\Contracts\Repositories;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface FileRepositoryContract
{
    public function create(UploadedFile $file, string $filepath, string $name): FileModel;
    public function findById(FileId $fileId): FileModel;
    public function removeById(FileId $fileId): bool;
    public function getAllPaginated(): LengthAwarePaginator;
    public function getAllImages(): Collection;
}
