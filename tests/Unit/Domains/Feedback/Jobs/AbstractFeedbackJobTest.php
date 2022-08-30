<?php

namespace Tests\Unit\Domains\Feedback\Jobs;

use App\Http\Requests\UserFeedbackRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class AbstractFeedbackJobTest extends TestCase
{
    use WithFaker;

    protected function mockRequest(): UserFeedbackRequest
    {
        $request = new UserFeedbackRequest();

        $request->setValidator(Validator::make([
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'message' => $this->faker->text(),
            'subject' => $this->faker->numberBetween(0, 3),
        ], $request->rules()));

        return $request;
    }
}
