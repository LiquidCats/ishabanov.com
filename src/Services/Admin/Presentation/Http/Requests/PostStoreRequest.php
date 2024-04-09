<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Requests;

use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\Enums\PostPreviewType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:250'],
            'preview' => ['required', 'string', 'min:5'],
            'blocks' => ['required', 'array'],
            'is_draft' => ['sometimes', 'boolean'],
            'published_at' => ['date'],
            'preview_image_id' => [
                'nullable',
                'string',
                Rule::when(
                    $this->get('preview_image_id') !== null,
                    [
                        Rule::exists('files', 'hash'),
                    ],
                ),
            ],
            'preview_image_type' => [
                'nullable',
                'string',
                Rule::when(
                    $this->get('preview_image_type') !== null,
                    [
                        Rule::enum(PostPreviewType::class),
                    ],
                ),
            ],
            'tags' => ['array'],
            'tags.*.id' => ['numeric', Rule::exists(TagModel::class, 'id')],
        ];
    }
}
