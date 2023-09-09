<?php

namespace Tests\Unit\Api\Domain\Repositories;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use ishabanov\Api\Domain\Contracts\Repositories\TelegramRepositoryContract;
use ishabanov\Api\Domain\ValueObjects\ChatId;
use Tests\TestCase;

/**
 * @coversDefaultClass \ishabanov\Api\Infrastructure\Repositories\Telegram\TelegramRepository
 */
class TelegramRepositoryTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     * @covers ::sendMessage
     */
    public function shouldSendMessageToTelegram(): void
    {
        // Arrange
        Http::fake([
            '*' => Http::response(['ok' => true]),
        ]);

        /** @var TelegramRepositoryContract $repo */
        $repo = $this->app->make(TelegramRepositoryContract::class);

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
