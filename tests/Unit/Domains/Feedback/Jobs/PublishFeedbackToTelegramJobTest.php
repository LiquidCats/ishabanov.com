<?php

namespace Tests\Unit\Domains\Feedback\Jobs;

use App\Domains\Feedback\Jobs\PublishFeedbackToTelegramJob;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class PublishFeedbackToTelegramJobTest extends AbstractFeedbackJobTest
{
    /**
     * @test
     *
     * @return void
     */
    public function should_send_message_to_telegram(): void
    {
        Http::fake([
            '*' => Http::response(['ok' => true]),
        ]);

        $request = $this->mockRequest();

        $job = new PublishFeedbackToTelegramJob($request);

        $this->app->call([$job, 'handle']);

        Http::assertSent(static function (Request $request) {
            return $request->offsetExists('chat_id')
                && $request->offsetExists('text');
        });
    }
}
