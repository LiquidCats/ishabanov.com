<?php

namespace ishabanov\Api;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Log\LogManager;
use ishabanov\Api\Application\Services\FeedbackService;
use ishabanov\Api\Domain\Contracts\Repositories\TelegramRepositoryContract;
use ishabanov\Api\Domain\Contracts\Repositories\UserFeedbackRepositoryContract;
use ishabanov\Api\Domain\Contracts\Services\FeedbackServiceContract;
use ishabanov\Api\Domain\ValueObjects\ChatId;
use ishabanov\Api\Domain\ValueObjects\Token;
use ishabanov\Api\Infrastructure\Repositories\Eloquent\Repositories\UserFeedbackRepository;
use ishabanov\Api\Infrastructure\Repositories\Telegram\TelegramRepository;

class ApplicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
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
