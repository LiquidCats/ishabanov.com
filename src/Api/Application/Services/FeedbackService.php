<?php

namespace ishabanov\Api\Application\Services;

use ishabanov\Api\Domain\Contracts\Repositories\TelegramRepositoryContract;
use ishabanov\Api\Domain\Contracts\Repositories\UserFeedbackRepositoryContract;
use ishabanov\Api\Domain\Contracts\Services\FeedbackServiceContract;
use ishabanov\Api\Domain\Entities\TelegramFeedbackMessage;
use ishabanov\Api\Domain\ValueObjects\ChatId;
use ishabanov\Api\Presentation\Http\Requests\UserFeedbackRequest;
use ishabanov\Core\Domain\Enums\FeedbackType;
use Psr\Log\LoggerInterface;

readonly class FeedbackService implements FeedbackServiceContract
{
    public function __construct(
        private LoggerInterface            $logger,
        private TelegramRepositoryContract $telegramRepository,
        private UserFeedbackRepositoryContract $userFeedbackRepository,
        private ChatId                     $chatId,
        private string                     $environment,
    ) {
    }

    public function handleFeedback(UserFeedbackRequest $request): void
    {
        $this->logger->notice('feedback message received', ['data' => $request->validated()]);

        $email = $request->validated('email');
        $name = $request->validated('name');
        $message = $request->validated('message');

        $this->userFeedbackRepository->save(
            $email,
            $name,
            $message,
        );

        $subject = FeedbackType::from((int) $request->validated('subject'));

        $message = new TelegramFeedbackMessage(
            $email,
            $name,
            $message,
            $this->environment,
            $subject
        );

        if (! $this->telegramRepository->sendMessage($this->chatId, $message)) {
            $this->logger->error('feedback to telegram failed', ['data' => $request->validated()]);
        }
    }
}
