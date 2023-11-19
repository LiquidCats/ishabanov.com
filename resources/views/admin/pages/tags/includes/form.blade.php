<form action="@stack('form_action')" method="POST">
    @stack('form_method')
    @csrf
    <div class="mb-3">
        <label for="tag-name" class="form-label">Name</label>
        <input type="text" name="name" value="{{ old('name', $tag->name) }}" class="form-control" id="tag-name"
               placeholder="Name">
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="tag-slug" class="form-label">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $tag->slug) }}" class="form-control" id="tag-slug"
               placeholder="Slug">
    </div>
    @error('slug')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Save</button>
    </div>
</form>
