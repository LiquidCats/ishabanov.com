<?php

declare(strict_types=1);

namespace App\Domains\Feedback\Services;

use App\Data\Contracts\Repositories\TelegramRepositoryContract;
use App\Data\Enums\FeedbackType;
use App\Data\ValueObject\Telegram\ChatId;
use App\Domains\Feedback\Contracts\Services\FeedbackServiceContract;
use App\Http\Requests\UserFeedbackRequest;
use Illuminate\Contracts\Foundation\Application;

class FeedbackService implements FeedbackServiceContract
{
    public function __construct(
        protected Application $app,
        protected TelegramRepositoryContract $telegramRepository,
        protected ChatId $chatId
    ) {
    }

    public function publish(UserFeedbackRequest $request): bool
    {
        $subject = FeedbackType::from((int) $request->validated('subject'));

        $message = "Name: {$request->validated('name')}\n";
        $message .= "Email: {$request->validated('email')}\n";
        $message .= "Subject: {$subject->getText()}\n";
        $message .= "Message: {$request->validated('message')}\n\n";
        $message .= 'ENV: '.$this->app->environment();

        return $this->telegramRepository->sendMessage($this->chatId, $message);
    }
}
