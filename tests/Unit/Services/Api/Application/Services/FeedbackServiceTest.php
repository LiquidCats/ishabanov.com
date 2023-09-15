<?php

namespace Tests\Unit\Services\Api\Application\Services;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use App\Data\Database\Eloquent\Models\UserFeedback;
use App\Domains\Feedback\Contracts\Services\FeedbackServiceContract;
use Tests\Asset\Api\Traits\WithLoggerMocks;
use Tests\Asset\Api\Traits\WithRequestMocks;
use Tests\TestCase;

/**
 * @coversDefaultClass \App\Api\Application\Services\FeedbackService
 */
class FeedbackServiceTest extends TestCase
{
    use WithFaker;
    use WithLoggerMocks;
    use WithRequestMocks;

    /**
     * @test
     *
     * @covers ::handleFeedback
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
