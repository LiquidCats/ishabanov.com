<?php

declare(strict_types=1);

namespace Tests\Feature\Api\Presentation;

use Illuminate\Http\Client\Request as Client;
use Illuminate\Support\Facades\Http;
use ishabanov\Core\Infrastructure\Eloquent\Models\UserFeedback;
use function route;
use Tests\Asset\Api\Traits\WithLoggerMocks;

use Tests\TestCase;

class UserFeedbackTest extends TestCase
{
    use WithLoggerMocks;

    /**
     * @test
     */
    public function shouldSuccessfulProvideResponse(): void
    {
        // Arrange
        Http::fake(['*' => Http::response(['ok' => true])]);
        $this->mockFeedbackLogger();

        $feedback = UserFeedback::factory()->make();

        $this->assertDatabaseCount($feedback->getTable(), 0);

        // Act
        $response = $this->postJson(route('api.feedback'), [
            'name' => $feedback->name,
            'email' => $feedback->email,
            'message' => $feedback->message,
        ]);

        // Assert
        $response->assertOk();
        $response->assertJsonStructure([
            'status',
        ]);

        Http::assertSent(static fn (Client $c) => $c->offsetExists('chat_id') && $c->offsetExists('text'));

        $this->assertDatabaseCount($feedback->getTable(), 1);
    }
}
