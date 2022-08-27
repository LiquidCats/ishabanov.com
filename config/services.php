<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
    'telegram' => [
        'api' => 'https://api.telegram.org/bot',
        'announcer' => [
            'token' => env('TG_ANNOUNCER_TOKEN'),
            'chat_id' => env('TG_ANNOUNCER_CHAT_ID')
        ],

    ]
];
