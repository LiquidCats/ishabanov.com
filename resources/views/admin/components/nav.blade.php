<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
            <i data-feather="home"
               stroke-width="1.5"
               width="24"
               height="24"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.posts.list') }}">
            <i data-feather="file-text"
               stroke-width="1.5"
               width="24"
               height="24"></i> Posts
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.tags.list') }}">
            <i data-feather="tag"
               stroke-width="1.5"
               width="24"
               height="24"></i> Tags
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
            <i data-feather="file"
               stroke-width="1.5"
               width="24"
               height="24"></i> Files
        </a>
      </li>
    </ul>
  </div>
</nav>
