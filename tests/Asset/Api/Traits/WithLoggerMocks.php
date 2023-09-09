<?php

namespace Tests\Asset\Api\Traits;

use Illuminate\Log\LogManager;
use Psr\Log\LoggerInterface;

trait WithLoggerMocks
{
    protected function mockFeedbackLogger(): void
    {
        $logMock = \Mockery::mock(LoggerInterface::class);
        $logMock->shouldReceive('notice')
            ->withAnyArgs()
            ->andReturn()
            ->once();

        $managerMock = \Mockery::mock(LogManager::class);
        $managerMock->shouldReceive('channel')
            ->withArgs(['feedback'])
            ->andReturn($logMock);

        $this->app->instance(LogManager::class, $managerMock);
    }
}
