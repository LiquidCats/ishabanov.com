<?php

namespace App\Domains\Files\Validation\Rules;

use App\Domains\Files\Contracts\Repositories\FileRepositoryContract;
use Closure;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Contracts\Validation\ValidationRule;

readonly class IsNotUploaded implements ValidationRule
{
    public function __construct(private FileRepositoryContract $fileRepository)
    {
    }

    /**
     * @param  UploadedFile  $value
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->fileRepository->isUploaded($value)) {
            $fail('this file is already uploaded');
        }
    }
}
