<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-clipboard-data-fill"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.posts.list') }}">
            <i class="bi bi-postcard-fill"></i> Posts
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.tags.list') }}">
            <i class="bi bi-tags-fill"></i> Tags
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.files.list') }}">
            <i class="bi bi-file-earmark-image-fill"></i>Files
        </a>
      </li>
    </ul>
  </div>
</nav>
