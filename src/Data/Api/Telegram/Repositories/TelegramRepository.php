<?php

declare(strict_types=1);

namespace App\Data\Api\Telegram\Repositories;

use App\Domains\Telegram\Contracts\Repositories\TelegramRepositoryContract;
use App\Domains\Telegram\ValueObjects\ChatId;
use App\Domains\Telegram\ValueObjects\Token;
use Illuminate\Support\Facades\Http;

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
