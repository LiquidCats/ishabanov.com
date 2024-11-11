<?php

declare(strict_types=1);

use App\Foundation\Secrets\DockerSecret;
use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', ':memory:'),
            'prefix' => 'lc_',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => DockerSecret::fromEnv('DATABASE_URL')->getValue(),
            'host' => DockerSecret::fromEnv('DB_HOST')->getValue(),
            'port' => DockerSecret::fromEnv('DB_PORT')->getValue(),
            'database' => DockerSecret::fromEnv('DB_DATABASE')->getValue(),
            'username' => DockerSecret::fromEnv('DB_USERNAME')->getValue(),
            'password' => DockerSecret::fromEnv('DB_PASSWORD')->getValue(),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'prefer',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            //'url' => DockerSecret::fromEnv('REDIS_URL')->getValue(),
            'host' => DockerSecret::fromEnv('REDIS_HOST')->getValue(),
            'username' => DockerSecret::fromEnv('REDIS_USERNAME')->getValue(),
            'password' => DockerSecret::fromEnv('REDIS_PASSWORD')->getValue(),
            'port' => DockerSecret::fromEnv('REDIS_PORT')->getValue(),
            'database' => DockerSecret::fromEnv('REDIS_DB')->getValue(),
        ],

        'cache' => [
            //'url' => DockerSecret::fromEnv('REDIS_URL')->getValue(),
            'host' => DockerSecret::fromEnv('REDIS_HOST')->getValue(),
            'username' => DockerSecret::fromEnv('REDIS_USERNAME')->getValue(),
            'password' => DockerSecret::fromEnv('REDIS_PASSWORD')->getValue(),
            'port' => DockerSecret::fromEnv('REDIS_PORT')->getValue(),
            'database' => DockerSecret::fromEnv('REDIS_CACHE_DB')->getValue(),
        ],

    ],

];
