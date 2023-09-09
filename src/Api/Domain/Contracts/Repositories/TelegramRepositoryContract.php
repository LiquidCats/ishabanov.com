<?php

declare(strict_types=1);

namespace ishabanov\Api\Domain\Contracts\Repositories;

use ishabanov\Api\Domain\ValueObjects\ChatId;

interface TelegramRepositoryContract
{
    /**
     * @see https://core.telegram.org/bots/api#sendmessage
     */
    public function sendMessage(ChatId $chatId, string $message): bool;
}
