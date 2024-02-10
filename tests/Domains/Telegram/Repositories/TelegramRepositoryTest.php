<?php

namespace Tests\Domains\Telegram\Repositories;

use App\Data\Api\Telegram\Repositories\TelegramRepository;
use App\Domains\Telegram\Contracts\Repositories\TelegramRepositoryContract;
use App\Domains\Telegram\ValueObjects\ChatId;
use App\Domains\Telegram\ValueObjects\Token;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

/**
 * @coversDefaultClass \App\Data\Api\Telegram\Repositories\TelegramRepository
 */
class TelegramRepositoryTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     *
     * @covers ::sendMessage
     */
    public function shouldSendMessageToTelegram(): void
    {
        // Arrange
        Http::fake([
            '*' => Http::response(['ok' => true]),
        ]);

        /** @var TelegramRepositoryContract $repo */
        $repo = new TelegramRepository(new Token('test'));
        /** @var ChatId<string> $chatId */
        $chatId = new ChatId('test');
        $message = $this->faker->text;
        // Act
        $result = $repo->sendMessage($chatId, $message);

        // Assert
        self::assertTrue($result);

        Http::assertSent(
            fn (Request $request) => $request->offsetExists('chat_id')
            && $request->offsetExists('text')
            && $request->offsetGet('chat_id') === $chatId->getValue()
            && $request->offsetGet('text') === $message
        );
    }
}
