<?php

namespace Tests\Unit\Domains\Feedback\Jobs;

use App\Domains\Feedback\Jobs\LogFeedbackToFileJob;
use App\Http\Requests\UserFeedbackRequest;
use Illuminate\Log\LogManager;
use Illuminate\Support\Facades\Validator;
use Mockery;
use Psr\Log\LoggerInterface;

class LogFeedbackToFileJobTest extends AbstractFeedbackJobTest
{
    /**
     * @test
     *
     * @return void
     */
    public function should_log_the_request(): void
    {
        $request = $this->mockRequest();

        $logMock = Mockery::mock(LoggerInterface::class);
        $logMock->shouldReceive('notice')
            ->withArgs(['feedback message received', $request->validated()])
            ->andReturn();

        $managerMock = Mockery::mock(LogManager::class);
        $managerMock->shouldReceive('channel')
            ->withArgs(['feedback'])
            ->andReturn($logMock);

        $job = new LogFeedbackToFileJob($request);

        $this->app->call([$job, 'handle']);
    }
}
