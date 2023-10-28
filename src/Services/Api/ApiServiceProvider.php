<?php

namespace App\Api;

use App\Api\Application\Services\FeedbackService;
use App\Api\Provides\RouteServiceProvider;
use App\Data\Api\Telegram\Repositories\TelegramRepository;
use App\Data\Database\Eloquent\Repositories\UserFeedbackRepository;
use App\Domains\Feedback\Contracts\Repositories\UserFeedbackRepositoryContract;
use App\Domains\Feedback\Contracts\Services\FeedbackServiceContract;
use App\Domains\Telegram\Contracts\Repositories\TelegramRepositoryContract;
use App\Domains\Telegram\ValueObjects\ChatId;
use App\Domains\Telegram\ValueObjects\Token;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Log\LogManager;

class ApiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        //
        $this->app->singleton(FeedbackServiceContract::class, static function (Application $app) {
            /** @var Repository $config */
            $config = $app->make('config');

            /** @var TelegramRepositoryContract $telegram */
            $telegram = $app->make(TelegramRepositoryContract::class);
            $userFeedback = $app->make(UserFeedbackRepositoryContract::class);

            $chatId = new ChatId($config->get('services.telegram.announcer.chat_id'));

            return new FeedbackService(
                logger: $app->make(LogManager::class)->channel('feedback'),
                telegramRepository: $telegram,
                userFeedbackRepository: $userFeedback,
                chatId: $chatId,
                environment: $app->environment()
            );
        });

        $this->app->singleton(TelegramRepositoryContract::class, static function (Application $app) {
            /** @var Repository $config */
            $config = $app->make('config');

            $token = new Token($config->get('services.telegram.announcer.token'));
            $api = $config->get('services.telegram.api');

            return new TelegramRepository($token, $api);
        });

        $this->app->singleton(UserFeedbackRepositoryContract::class, UserFeedbackRepository::class);
    }
}
