<?php

declare(strict_types=1);

namespace ishabanov\Api\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
                'string',
                'min:1',
                'max:100',
            ],
            'email' => [
                'required',
                'email',
                'min:3',
                'max:100',
            ],
            'message' => [
                'required',
                'min:1',
                'max:200',
            ],
        ];
    }
}
