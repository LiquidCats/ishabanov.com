<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Models;

use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Files\ValueObjects\FileId;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use function sha1_file;

/**
 * @property string $hash
 * @property string $type
 * @property string $path
 * @property string $extension
 * @property string $name
 * @property int $file_size
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 */
class File extends Model implements FileRepositoryContract
{
    protected $primaryKey = 'hash';

    protected $keyType = 'string';

    protected $casts = [
        'hash' => 'string',
        'type' => 'string',
        'path' => 'string',
        'extension' => 'string',
        'name' => 'string',
        'file_size' => 'int',
    ];

    public function create(UploadedFile $file, string $filepath, string $name): File
    {
        $model = new File();

        $model->hash = sha1_file($file->path());
        $model->type = $file->getMimeType();
        $model->path = $filepath;
        $model->file_size = $file->getSize();
        $model->extension = $file->getClientOriginalExtension();
        $model->name = $name;

        $model->save();

        return $model;
    }

    public function findById(FileId $fileId): File
    {
        return $this->newQuery()
            ->findOrFail($fileId);
    }


    public function removeById(FileId $fileId): bool
    {
        return self::destroy($fileId) > 0;
    }

    public function getAllPaginated(): LengthAwarePaginator
    {
        return $this->newQuery()
            ->paginate();
    }
}
