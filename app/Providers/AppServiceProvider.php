<?php

declare(strict_types=1);

namespace App\Providers;

use App\Data\Contracts\Repositories\TelegramRepositoryContract;
use App\Data\Repositories\TelegramRepository;
use App\Data\ValueObject\Telegram\{
    ChatId,
    Token
};
use App\Domains\Feedback\Contracts\Services\FeedbackServiceContract;
use App\Domains\Feedback\Services\FeedbackService;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        // Repositories
        $this->app->singleton(TelegramRepositoryContract::class, static function (Application $app) {
            /** @var Repository $config */
            $config = $app->make('config');

            $token = new Token($config->get('services.telegram.announcer.token'));
            $api = $config->get('services.telegram.api');

            return new TelegramRepository($token, $api);
        });

        // Domain.Feedback
        $this->app->singleton(FeedbackServiceContract::class, static function (Application $app) {
            /** @var Repository $config */
            $config = $app->make('config');

            /** @var TelegramRepositoryContract $repository */
            $repository = $app->make(TelegramRepositoryContract::class);

            $chatId = new ChatId($config->get('services.telegram.announcer.chat_id'));

            return new FeedbackService( $app, $repository, $chatId);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
