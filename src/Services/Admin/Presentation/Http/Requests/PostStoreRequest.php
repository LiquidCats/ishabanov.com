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
            'content' => ['required', 'string', 'min:5'],
            'is_draft' => ['sometimes', 'accepted'],
            'published_at' => ['date'],
            'post_tags' => ['array'],
            'preview_image_id' => ['sometimes', 'nullable', 'string', Rule::exists('files', 'hash')],
            'preview_image_type' => ['sometimes', 'nullable', 'string', Rule::enum(PostPreviewType::class)],
            'post_tags.*' => ['numeric', Rule::exists(TagModel::class, 'id')],
        ];
    }
}
