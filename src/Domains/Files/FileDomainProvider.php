<?php

declare(strict_types=1);

namespace App\Domains\Files;

use const DIRECTORY_SEPARATOR;

use App\Admin\Application\Services\FileService;
use App\Data\Database\Eloquent\Models\FileModel;
use App\Data\Filesystem\Storage\Options;
use App\Data\Filesystem\Storage\Repositories\UploadedFilesStorage;
use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Files\Contracts\Repositories\UploadedFilesStorageContract;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class FileDomainProvider extends ServiceProvider
{
    public function boot(): void
    {
        Route::pattern('file_id', '[a-z0-9]{32,255}');
    }

    public function register(): void
    {
        $this->app->singleton(UploadedFilesStorageContract::class, static function (Application $app) {
            /** @var Factory $f */
            $f = $app->make(Factory::class);
            /** @var Repository $config */
            $config = $app->make(Repository::class);

            $disk = $config->get('filesystems.default');

            $options = new Options(
                prepend: 'ishabanov'.DIRECTORY_SEPARATOR.$app->environment(),
                path: $config->get('filesystems.upload_path'),
            );

            return new UploadedFilesStorage($f->disk($disk), $options);
        });
        $this->app->singleton(FileRepositoryContract::class, FileModel::class);
        $this->app->singleton(FileServiceContract::class, FileService::class);
    }
}
