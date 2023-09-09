<?php

declare(strict_types=1);

namespace ishabanov\Api\Infrastructure\Repositories\Telegram;

use Illuminate\Support\Facades\Http;
use ishabanov\Api\Domain\Contracts\Repositories\TelegramRepositoryContract;
use ishabanov\Api\Domain\ValueObjects\{Token, ChatId};

class TelegramRepository implements TelegramRepositoryContract
{
    public function __construct(
        protected Token $token,
        protected string $apiLink = 'https://api.telegram.org/bot'
    ) {
    }

    public function sendMessage(ChatId $chatId, string $message): bool
    {
        $response = Http::get($this->apiLink.$this->token->getValue().'/sendMessage', [
            'chat_id' => $chatId->getValue(),
            'text' => $message,
        ]);

        return $response->successful()
            && $response->json('ok');
    }
}
