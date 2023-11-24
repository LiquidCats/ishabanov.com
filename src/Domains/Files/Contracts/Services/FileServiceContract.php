<?php

declare(strict_types=1);

namespace App\Domains\Files\Contracts\Services;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface FileServiceContract
{
    public function store(UploadedFile $file, string $name): ?FileModel;

    public function drop(FileId $fileId): bool;

    public function paginate(): LengthAwarePaginator;

    public function getImages(): Collection;
}
