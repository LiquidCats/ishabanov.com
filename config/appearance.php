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
                    'link' => 'admin.dashboard',
                    'text' => 'Dashboard',
                    'icon' => 'clipboard-data-fill',
                ],
                [
                    'link' => 'admin.posts.list',
                    'text' => 'Posts',
                    'icon' => 'postcard-fill',
                ],
                [
                    'link' => 'admin.tags.list',
                    'text' => 'Tags',
                    'icon' => 'tags-fill',
                ],
                [
                    'link' => 'admin.files.list',
                    'text' => 'Files',
                    'icon' => 'file-earmark-image-fill',
                ],
                [
                    'link' => '#',
                    'text' => 'Users',
                    'icon' => 'people-fill',
                ],
                [],
                [
                    'link' => '#',
                    'text' => 'Settings',
                    'icon' => 'sliders',
                ],
                [],
                [
                    'link' => 'auth.logout',
                    'text' => 'Sign Out',
                    'icon' => 'power',
                    'type' => 'danger',
                ],
            ],
        ],
    ],
];
