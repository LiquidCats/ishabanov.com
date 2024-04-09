<?php

declare(strict_types=1);

namespace App\Data\Database\Eloquent\Models;

use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use App\Domains\Files\Enums\AllowedTypes;
use App\Domains\Files\ValueObjects\FileId;
use Carbon\Carbon;
use Database\Factories\FileFactory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

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
 *
 * @mixin Builder
 */
class FileModel extends Model implements FileRepositoryContract
{
    use HasFactory;

    protected $table = 'files';

    protected $primaryKey = 'hash';

    protected $keyType = 'string';

    protected $casts = [
        'hash' => 'string',
        'type' => AllowedTypes::class,
        'path' => 'string',
        'extension' => 'string',
        'name' => 'string',
        'file_size' => 'int',
    ];

    public function getFileUrl(): string
    {
        return app(UploadedFilesStorageContract::class)->url($this->path);
    }

    protected static function newFactory(): FileFactory
    {
        return FileFactory::new();
    }

    public function create(string $filename, UploadedFile $uploadedFile): FileModel
    {
        $model = new FileModel();

        $model->hash = sha1_file($uploadedFile->path());
        $model->type = $uploadedFile->getMimeType();
        $model->path = $uploadedFile->hashName();
        $model->file_size = $uploadedFile->getSize();
        $model->extension = $uploadedFile->getClientOriginalExtension();
        $model->name = $filename;

        $model->save();

        return $model;
    }

    public function findById(FileId $fileId): self
    {
        return static::query()->findOrFail($fileId);
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

    public function getAllImages(): Collection
    {
        return $this->newQuery()
            ->whereIn('type', AllowedTypes::images())
            ->get();
    }

    public function isUploaded(UploadedFile $uploadedFile): bool
    {
        return $this->newQuery()
            ->where('hash', sha1_file($uploadedFile->path()))
            ->exists();
    }
}
