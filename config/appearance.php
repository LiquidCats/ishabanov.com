<?php

declare(strict_types=1);

return [
    'site' => [
        'theme' => env('APPEARANCE_SITE_THEME', 'default'),
        'logo' => env('APPEARANCE_SITE_LOGO', 'images/logo.svg'),
        'links' => [
            'menu' => [
                [
                    'link' => 'pages.home',
                    'text' => 'Home',
                ],
                [
                    'link' => 'pages.blog',
                    'text' => 'Posts',
                ],
                [
                    'link' => 'pages.about',
                    'text' => 'About',
                ],
            ],
            'socials' => [
                [
                    'icon' => 'instagram',
                    'link' => 'https://www.instagram.com/degradation.of.mine',
                    'text' => 'Instagram',
                ],
                [
                    'icon' => 'linkedin',
                    'link' => 'https://www.linkedin.com/in/ilia-shabanov',
                    'text' => 'Linkedin',
                ],
                [
                    'icon' => 'github',
                    'link' => 'https://github.com/LiquidCats',
                    'text' => 'GitHub',
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
