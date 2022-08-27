<?php

declare(strict_types=1);

namespace App\Data\Contracts\Repositories;

use App\Data\ValueObject\Telegram\ChatId;

interface TelegramRepositoryContract
{
    /**
     * @see https://core.telegram.org/bots/api#sendmessage
     *
     * @param ChatId $chatId
     * @param string $message
     *
     * @return bool
     */
    public function sendMessage(ChatId $chatId, string $message): bool;
}
