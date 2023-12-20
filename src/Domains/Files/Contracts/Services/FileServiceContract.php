<?php

declare(strict_types=1);

namespace App\Domains\Files\Contracts\Services;

use App\Data\Database\Eloquent\Models\FileModel;
use App\Domains\Files\Enums\FilterTypes;
use App\Domains\Files\ValueObjects\FileId;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface FileServiceContract
{
    /**
     * @return Collection<int, FileModel>
     */
    public function storeMany(array $data): Collection;

    public function drop(FileId $fileId): FileModel;

    public function list(?FilterTypes $type = null): LengthAwarePaginator|Collection;
}
