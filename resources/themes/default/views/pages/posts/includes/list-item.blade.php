@php
    use App\Domains\Blog\Enums\PostPreviewType;

    /** @var App\Data\Database\Eloquent\Models\PostModel $post */
@endphp

@includeWhen(
    $post->preview_image_type === null,
    '.pages.posts.includes.list-item.no-preview',
    ['post' => $post]
)

@includeWhen(
    $post->preview_image_type === PostPreviewType::LEFT_SIDE,
    '.pages.posts.includes.list-item.left-side-preview',
    ['post' => $post]
)

@includeWhen(
    $post->preview_image_type === PostPreviewType::FILL,
    '.pages.posts.includes.list-item.preview-fill',
    ['post' => $post]
)
