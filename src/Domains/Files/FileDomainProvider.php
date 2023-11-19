<?php

declare(strict_types=1);

namespace App\Domains\Files;

use App\Admin\Application\Services\FileService;
use App\Data\Database\Eloquent\Models\FileModel;
use App\Data\Filesystem\Storage\Repositories\StorageRepository;
use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Files\Contracts\Repositories\StorageRepositoryContract;
use App\Domains\Files\Contracts\Services\FileServiceContract;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\ServiceProvider;

class FileDomainProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(StorageRepositoryContract::class, static function (Container $app) {
            /** @var Factory $f */
            $f = $app->make(Factory::class);
            return new StorageRepository($f->disk('public'));
        });
        $this->app->singleton(FileRepositoryContract::class, FileModel::class);
        $this->app->singleton(FileServiceContract::class, FileService::class);
    }
}
