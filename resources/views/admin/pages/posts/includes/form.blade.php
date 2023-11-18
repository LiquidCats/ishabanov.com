@php use App\Domains\Blog\Enums\PostPreviewType; @endphp
@php /** @var App\Data\Database\Eloquent\Models\PostModel $post */ @endphp
@php /** @var App\Data\Database\Eloquent\Models\FileModel $preview */ @endphp

<form method="POST" action="@stack('form_action')">
    @stack('form_method')
    @csrf

    <ul class="nav nav-pills mb-3" id="post-form-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active"
                    id="pills-main-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-main"
                    type="button"
                    role="tab"
                    aria-controls="pills-home"
                    aria-selected="true">Main</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link"
                    id="pills-preview-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-preview"
                    type="button"
                    role="tab"
                    aria-controls="pills-profile"
                    aria-selected="false">Preview</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link"
                    id="pills-content-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-content"
                    type="button"
                    role="tab"
                    aria-controls="pills-contact"
                    aria-selected="false">Content</button>
        </li>
    </ul>
        <div class="tab-content" id="post-form-tabs-content">
        <div class="tab-pane fade show active" id="pills-main" role="tabpanel" aria-labelledby="pills-main-tab" tabindex="0">

            <div class="mb-3">
                <label for="post-title" class="form-label">Title</label>
                <input type="text"
                       name="title"
                       value="{{ old('title', $post?->title) }}"
                       class="form-control"
                       id="post-title"
                       placeholder="Tile">
            </div>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="post-published-at" class="form-label">Published At (UTC)</label>
                <input type="text"
                       name="published_at"
                       value="{{ old('published_at', $post?->published_at?->toDateTimeString('minutes')) }}"
                       class="form-control"
                       id="post-published-at" placeholder="Published At"/>
            </div>
            @error('published_at')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" name="is_draft" type="checkbox"
                           id="post-is-draft" @checked(old('is_draft', $post->is_draft))>
                    <label class="form-check-label" for="post-is-draft">Draft</label>
                </div>
            </div>
            @error('is_draft')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="post-tags" class="form-label">Tags</label>
                <select class="form-select" id="post-tags" name="post_tags[]" multiple aria-label="multiple select example" size="10">
                    @foreach($tags as $tag)
                        <option
                            value="{{ $tag->getKey() }}" @selected($postTagIds->contains($tag->getKey()))>{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="tab-pane fade" id="pills-preview" role="tabpanel" aria-labelledby="pills-preview-tab" tabindex="0">
            <div class="mb-3">
                <div class="mb-3 fw-bold">Preview Image</div>
                <div class="hstack gap-2">
                    <input class="btn-check"
                           type="radio"
                           name="preview_image_id"
                           id="image-none"
                           value="none" @checked(null === $post->preview_image_id)>
                    <label for="image-none" class="btn">None</label>
                @foreach($previews as $preview)
                    <input class="btn-check"
                           type="radio"
                           name="preview_image_id"
                           id="image-{{ $preview->hash }}"
                           value="{{ $preview->hash }}" @checked($preview->hash === old('preview_image_id', $post->preview_image_id))>
                    <label for="image-{{ $preview->hash }}" class="btn">
                        <img class="d-block img-thumbnail" style="max-height: 64px;" src="{{ asset('storage/'.$preview->path) }}" alt="{{ $preview->name }}">
                        <span class="text-truncate">{{ $preview->name }}</span>
                    </label>
                @endforeach
                </div>
            </div>
            @error('preview_image_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <div class="mb-3 fw-bold">Preview Type</div>
                <div class="hstack gap-2">
                    <input class="btn-check"
                           type="radio"
                           name="preview_image_type"
                           id="preview-type-none"
                           value="none" @checked(null === $post->preview_image_type)>
                    <label for="preview-type-none" class="btn">None</label>
                @foreach(PostPreviewType::cases() as $postPreviewType)
                    <input class="btn-check"
                           type="radio"
                           name="preview_image_type"
                           id="preview-type-{{ $postPreviewType->value }}"
                           value="{{ $postPreviewType->value }}"
                           autocomplete="off"  @checked($postPreviewType->value === old('preview_image_type', $post->preview_image_type?->value))>
                    <label for="preview-type-{{ $postPreviewType->value }}" class="btn">{{ $postPreviewType->toText() }}</label>
                @endforeach
                </div>

            </div>
            @error('preview_image_type')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <hr>
            <div class="mb-3">
                <label for="post-introduction" class=" form-label">Introduction</label>
                <textarea class="form-control mce-editable" name="preview" id="post-introduction" rows=30" placeholder="Preview">
                    {{ old('preview', $post?->preview) }}
                </textarea>
            </div>
            @error('preview')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="tab-pane fade" id="pills-content" role="tabpanel" aria-labelledby="pills-content-tab" tabindex="0">
            <div class="mb-3">
                <label for="post-content" class="d-none form-label">Content</label>
                <textarea class="form-control mce-editable" name="content" id="post-content" rows=30" placeholder="Content">
                    {{ old('content', $post?->content) }}
                </textarea>
            </div>
            @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
