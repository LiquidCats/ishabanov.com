<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Requests;

use App\Domains\Files\Contracts\Services\FileServiceContract;
use App\Domains\Files\Validation\Rules\IsNotUploaded;
use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
{
    public function rules(): array
    {
        $fileRepository = $this->container
            ->make(FileServiceContract::class);

        return [
            'list' => ['required', 'array'],
            'list.*.file' => [
                'required',
                'mimes:png,svg,jpg,jpeg,bmp',
                'max:4096',
                new IsNotUploaded($fileRepository),
            ],
            'list.*.name' => ['required', 'string', 'max:250'],
        ];
    }
}
