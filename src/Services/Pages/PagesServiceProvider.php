<?php

namespace App\Pages;

use App\Pages\Presentation\Http\Views\Components\Footer;
use App\Pages\Presentation\Http\Views\Components\Header;
use App\Pages\Presentation\Http\Views\Components\Tag;
use App\Pages\Provides\RouteServiceProvider;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class PagesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    public function boot(): void
    {
        Blade::component(Tag::class, 'tag');
        Blade::component(Header::class, 'header');
        Blade::component(Footer::class, 'footer');
        Blade::componentNamespace('App\\Pages\\Presentation\\Http\\Views\\Components\\Posts', 'posts');
    }
}
