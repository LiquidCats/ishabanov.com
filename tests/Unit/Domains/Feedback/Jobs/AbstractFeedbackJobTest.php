<?php

namespace Tests\Unit\Domains\Feedback\Jobs;

use App\Http\Requests\UserFeedbackRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\ParameterBag;
use Tests\TestCase;

class AbstractFeedbackJobTest extends TestCase
{
    use WithFaker;

    protected function mockRequest(): UserFeedbackRequest
    {
        $request = new UserFeedbackRequest();

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'message' => $this->faker->text(),
            'subject' => $this->faker->numberBetween(0, 3),
        ];
        $validator = Validator::make($data, $request->rules());

        $request->query->add($data);

        $request->setValidator($validator);

        if ($validator->fails()) {
            $request = $this->mockRequest();
        }

        return $request;
    }
}
