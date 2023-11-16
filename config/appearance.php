<?php

declare(strict_types=1);

return [
    'theme' => [
        'site' => env('APPEARANCE_SITE_THEME', 'default'),
        'logo' => asset(env('APPEARANCE_SITE_LOGO', 'images/logo.svg')),
    ],

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
];
