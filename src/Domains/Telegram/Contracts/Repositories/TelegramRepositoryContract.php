<?php

declare(strict_types=1);

namespace App\Domains\Telegram\Contracts\Repositories;

use App\Domains\Telegram\ValueObjects\ChatId;

interface TelegramRepositoryContract
{
    /**
     * @see https://core.telegram.org/bots/api#sendmessage
     */
    public function sendMessage(ChatId $chatId, string $message): bool;
}
