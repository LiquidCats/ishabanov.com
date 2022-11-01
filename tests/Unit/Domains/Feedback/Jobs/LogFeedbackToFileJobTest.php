<?php

namespace Tests\Unit\Domains\Feedback\Jobs;

use App\Domains\Feedback\Jobs\LogFeedbackToFileJob;
use Illuminate\Log\LogManager;
use Psr\Log\LoggerInterface;

/**
 * @coversDefaultClass \App\Domains\Feedback\Jobs\LogFeedbackToFileJob
 */
class LogFeedbackToFileJobTest extends AbstractFeedbackJobTest
{
    /**
     * @test
     *
     * @covers ::handle
     */
    public function shouldLogTheRequest(): void
    {
        $request = $this->mockRequest();

        $logMock = $this->mock(LoggerInterface::class);
        $logMock->shouldReceive('notice')
            ->withArgs(['feedback message received', $request->validated()])
            ->once()
            ->andReturn();

        $managerMock = $this->mock(LogManager::class);
        $managerMock->shouldReceive('channel')
            ->withArgs(['feedback'])
            ->once()
            ->andReturn($logMock);

        $job = new LogFeedbackToFileJob($request);

        $this->app->call([$job, 'handle'], ['log' => $managerMock]);
    }
}
