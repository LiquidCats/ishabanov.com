<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Data\Models\UserEmail;
use App\Features\Feedback\UserFeedbackFeature;
use App\Http\Requests\UserFeedbackRequest;
use App\Mail\FeedbackReceived;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\{
    Client\Request as Client,
    JsonResponse,
    Request
};
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\{
    Http,
    Mail,
    Validator
};
use Mockery;
use Psr\Log\LoggerInterface;
use Tests\TestCase;
use Tests\Unit\Domains\Feedback\Jobs\AbstractFeedbackJobTest;

class UserFeedbackFeatureTest extends AbstractFeedbackJobTest
{
    /**
     * @test
     */
    public function shouldSuccessfulProvideResponse(): void
    {
        Mail::fake();
        Http::fake(['*' => Http::response(['ok' => true])]);

        $this->app->instance(UserFeedbackRequest::class, $this->mockRequest());
        $this->mockLogger();

        $feature = new UserFeedbackFeature();

        $result = $this->app->call([$feature, 'handle']);


        Mail::assertSent(FeedbackReceived::class);
        Http::assertSent(static fn (Client $c) => $c->offsetExists('chat_id') && $c->offsetExists('text'));

        self::assertInstanceOf(JsonResponse::class, $result);
        self::assertEquals(1, UserEmail::query()->count());
    }

    protected function mockLogger(): void
    {
        $logMock = Mockery::mock(LoggerInterface::class);
        $logMock->shouldReceive('notice')
            ->withArgs(['feedback message received', \request()->all()])
            ->andReturn();

        $managerMock = Mockery::mock(LogManager::class);
        $managerMock->shouldReceive('channel')
            ->withArgs(['feedback'])
            ->andReturn($logMock);
    }
}
