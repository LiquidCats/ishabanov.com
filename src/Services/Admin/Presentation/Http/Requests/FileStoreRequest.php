<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:250'],
            'file' => ['required', 'mimes:jpg,bmp,png', 'max:1024'],
        ];
    }
}
