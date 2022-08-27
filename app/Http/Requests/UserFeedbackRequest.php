<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Data\Enums\FeedbackType;
use App\Data\Models\UserEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UserFeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:100'
            ],
            'email' => [
                'required',
                'email',
                'min:3',
                'max:100',
                Rule::unique((new UserEmail())->getTable())
            ],
            'message' => [
                'required',
                'min:1',
                'max:200',
            ],
            'subject' => [
                'required',
                'integer',
                new Enum(FeedbackType::class)
            ],
        ];
    }
}
