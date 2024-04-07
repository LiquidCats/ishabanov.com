<?php

namespace App\Pages;

use App\Domains\Blocks\Contracts\Renderers\BlocksParserContract;
use App\Domains\Pages\Composers\PagesComposer;
use App\Domains\Pages\Contracts\Services\SitePagesServiceContract;
use App\Pages\Application\Services\SitePagesService;
use App\Pages\Presentation\Http\Views\Components\Footer;
use App\Pages\Presentation\Http\Views\Components\Header;
use App\Pages\Presentation\Http\Views\Components\Tag;
use App\Pages\Presentation\Http\Views\Renderers\Blocks\JsonBlocksParser;
use App\Pages\Provides\RouteServiceProvider;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Blade;

class PagesServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(SitePagesServiceContract::class, function (Container $c) {
            $composer = $c->make(PagesComposer::class);

            return $c->make(SitePagesService::class, ['composer' => $composer]);
        });

        $this->app->singleton(BlocksParserContract::class, JsonBlocksParser::class);
    }

    public function boot(): void
    {
        Blade::component(Tag::class, 'tag');
        Blade::component(Header::class, 'header');
        Blade::component(Footer::class, 'footer');
        Blade::componentNamespace('App\\Pages\\Presentation\\Http\\Views\\Components\\Posts', 'posts');
    }
}
