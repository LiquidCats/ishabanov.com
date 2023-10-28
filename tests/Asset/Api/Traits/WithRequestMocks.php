<?php

namespace Tests\Asset\Api\Traits;

use App\Api\Presentation\Http\Requests\UserFeedbackRequest;
use App\Data\Database\Eloquent\Models\UserFeedback;
use Illuminate\Support\Facades\Validator;

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
