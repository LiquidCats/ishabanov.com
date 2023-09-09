<?php

namespace Tests\Asset\Api\Traits;

use Illuminate\Support\Facades\Validator;
use ishabanov\Api\Presentation\Http\Requests\UserFeedbackRequest;
use ishabanov\Core\Infrastructure\Eloquent\Models\UserFeedback;

trait WithRequestMocks
{
    protected function mockFeedbackRequest(): UserFeedbackRequest
    {
        $request = new UserFeedbackRequest();

        $feedback = UserFeedback::factory()->make();
        $data = [
            'name' => $feedback->name,
            'email' => $feedback->email,
            'message' => $feedback->message,
            'subject' => $feedback->subject->value,
        ];
        $validator = Validator::make($data, $request->rules());

        $request->query->add($data);

        $request->setValidator($validator);

        if ($validator->fails()) {
            $request = $this->mockFeedbackRequest();
        }

        return $request;
    }
}
