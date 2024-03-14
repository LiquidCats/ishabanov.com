<?php

declare(strict_types=1);

return [
    'site' => [
        'theme' => env('APPEARANCE_SITE_THEME', 'default'),
        'logo' => env('APPEARANCE_SITE_LOGO', 'images/logo.svg'),
        'links' => [
            'menu' => [
                [
                    'icon' => 'home',
                    'link' => 'pages.home',
                    'text' => 'Home',
                ],
                [
                    'icon' => 'pencil-square',
                    'link' => 'pages.blog',
                    'text' => 'Posts',
                ],
                // [
                //     'link' => 'pages.about',
                //     'text' => 'About',
                // ],
            ],
            'socials' => [
                [
                    'icon' => 'sparkles',
                    'link' => 'https://www.linkedin.com/in/ilia-shabanov',
                    'text' => 'LinkedIn',
                ],
                [
                    'icon' => 'code-bracket',
                    'link' => 'https://github.com/LiquidCats',
                    'text' => 'GitHub',
                ],
                [
                    'icon' => 'envelope',
                    'link' => 'mailto:ishabanov@liquid-cat.com',
                    'text' => 'Mail',
                ],
            ],
        ],
    ],
    'admin' => [
        'links' => [
            'menu' => [
                [
                    'link' => '/admin/dashboard',
                    'text' => 'Dashboard',
                    'icon' => 'computer-desktop',
                ],
                [
                    'link' => '/admin/posts',
                    'text' => 'Posts',
                    'icon' => 'chat-bubble-left-right',
                ],
                [
                    'link' => '/admin/tags',
                    'text' => 'Tags',
                    'icon' => 'tag',
                ],
                [
                    'link' => '/admin/files',
                    'text' => 'Files',
                    'icon' => 'archive-box',
                ],
                // [
                //     'link' => '/admin/users',
                //     'text' => 'Users',
                //     'icon' => 'people-fill',
                // ],
                // [],
                // [
                //     'link' => '/admin/settings',
                //     'text' => 'Settings',
                //     'icon' => 'sliders',
                // ],
            ],
        ],
    ],
];
