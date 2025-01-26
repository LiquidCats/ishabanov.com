<?php

declare(strict_types=1);

use App\Foundation\Secrets\DockerSecret;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),
    'upload_path' => env('FILESYSTEM_UPLOAD_PATH', 'media'),
    'prepend_path' => env('FILESYSTEM_PREPEND_PATH', 'ishabanov'.DIRECTORY_SEPARATOR.env('APP_ENV')),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => DockerSecret::fromEnv('AWS_ACCESS_KEY_ID')->getValue(),
            'secret' => DockerSecret::fromEnv('AWS_SECRET_ACCESS_KEY')->getValue(),
            'region' => DockerSecret::fromEnv('AWS_DEFAULT_REGION')->getValue(),
            'bucket' => DockerSecret::fromEnv('AWS_BUCKET')->getValue(),
            'url' => DockerSecret::fromEnv('AWS_URL')->getValue(),
            'endpoint' => DockerSecret::fromEnv('AWS_ENDPOINT')->getValue(),
            'use_path_style_endpoint' => DockerSecret::fromEnv('AWS_USE_PATH_STYLE_ENDPOINT', true)->getValue(),
            'throw' => true,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
