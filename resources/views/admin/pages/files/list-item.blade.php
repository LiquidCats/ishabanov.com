@php use Illuminate\Support\Facades\Storage; @endphp
@php /** @var App\Data\Database\Eloquent\Models\File $file */ @endphp

<div class="col-6">

    <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
              <img src="{{ Storage::url($file->path) }}" class="img-fluid rounded-start" alt="{{ $file->name }}">
          </div>
          <div class="col-md-8">
              <div class="card-body">
                  <h5 class="card-title">{{ $file->name }}</h5>
                  <p class="card-text small text-muted">
                      <span>Hash: {{ $file->getKey() }}</span>
                      <span>{{ $file->created_at->diffForHumans() }}</span>
                  </p>
                  <form method="POST" action="{{ route('admin.files.delete', ['file_id' => $file->getKey()]) }}">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
              </div>

          </div>
        </div>
    </div>

</div>

