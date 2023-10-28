<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:250'],
            'slug' => ['required', 'string', 'min:3', 'max:250', Rule::unique('tags', 'slug')],
        ];
    }
}
