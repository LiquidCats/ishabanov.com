<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'admin/api/*'],

    'allowed_methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [
        'Accept',
        'Content-Type',
        'X-Requested-With',
        'Origin',
        'X-Xsrf-Token',
        'Cache-Control',
        'Expires',
        'Pragma',
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 120,

    'supports_credentials' => true,

];
