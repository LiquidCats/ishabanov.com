<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Requests;

use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use App\Domains\Files\Validation\Rules\IsNotUploaded;
use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
{
    public function rules(): array
    {
        /** @var FileRepositoryContract $fileRepository */
        $fileRepository = $this->container
            ->make(FileRepositoryContract::class);

        return [
            'list' => ['required', 'array'],
            'list.*.file' => [
                'required',
                'mimes:png,svg,jpg,jpeg,bmp',
                'max:1024',
                new IsNotUploaded($fileRepository),
            ],
            'list.*.name' => ['required', 'string', 'max:250'],
        ];
    }
}
