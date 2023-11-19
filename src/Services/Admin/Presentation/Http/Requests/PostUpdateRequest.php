<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Requests;

use App\Data\Database\Eloquent\Models\TagModel;
use App\Domains\Blog\Enums\PostPreviewType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Fluent;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'min:5', 'max:250'],
            'preview' => ['string', 'min:5'],
            'content' => ['string', 'min:5'],
            'is_draft' => ['sometimes', 'accepted'],
            'published_at' => ['date'],
            'post_tags' => ['array'],
            'preview_image_id' => [
                'sometimes',
                'string',
                Rule::when(
                    $this->get('preview_image_id') !== 'none',
                    [
                        Rule::exists('files', 'hash'),
                    ],
                ),
            ],
            'preview_image_type' => [
                'sometimes',
                'string',
                Rule::when(
                    $this->get('preview_image_type') !== 'none',
                    [
                        Rule::enum(PostPreviewType::class),
                    ],
                ),
            ],
            'post_tags.*' => ['numeric', Rule::exists(TagModel::class, 'id')],
        ];
    }
}
