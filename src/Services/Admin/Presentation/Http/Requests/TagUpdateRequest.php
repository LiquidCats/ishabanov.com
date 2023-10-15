<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'min:3', 'max:250'],
            'slug' => ['string', 'min:3', 'max:250'],
        ];
    }
}
