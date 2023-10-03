<?php

declare(strict_types=1);

namespace App\Admin\Presentation\Http\Requests;

use App\Data\Database\Eloquent\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'min:5', 'max:250'],
            'content' => ['string', 'min:5'],
            'is_draft' => ['sometimes', 'accepted'],
            'published_at' => ['date'],
            'post_tags' => ['array'],
            'post_tags.*' => ['numeric', Rule::exists(Tag::class, 'id')],
        ];
    }
}
