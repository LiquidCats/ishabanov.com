<?php

namespace Tests\Unit\Api\Application\Services;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use ishabanov\Api\Domain\Contracts\Services\FeedbackServiceContract;
use ishabanov\Api\Presentation\Http\Requests\UserFeedbackRequest;
use ishabanov\Core\Infrastructure\Eloquent\Models\UserFeedback;
use Tests\Asset\Api\Traits\WithLoggerMocks;
use Tests\Asset\Api\Traits\WithRequestMocks;
use Tests\TestCase;

/**
 * @coversDefaultClass \ishabanov\Api\Application\Services\FeedbackService
 */
class FeedbackServiceTest extends TestCase
{
    use WithFaker;
    use WithLoggerMocks;
    use WithRequestMocks;

    /**
     * @test
     * @covers ::handleFeedback
     * @return void
     */
    public function shouldHandleUSerFeedback(): void
    {
        // Arrange
        $this->mockFeedbackLogger();
        $request = $this->mockFeedbackRequest();

        Http::fake([
            '*' => Http::response(['ok' => true]),
        ]);

        /** @var FeedbackServiceContract $service */
        $service = $this->app->make(FeedbackServiceContract::class);

        // Act
        $service->handleFeedback($request);

        self::assertEquals(1, UserFeedback::query()->count());

        // Assert
        Http::assertSent(static function (Request $request) {
            return $request->offsetExists('chat_id')
                && $request->offsetExists('text');
        });
    }
}
