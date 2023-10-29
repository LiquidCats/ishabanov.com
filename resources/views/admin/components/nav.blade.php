<div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">iShabanov</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
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
                    <i class="bi bi-file-earmark-image-fill"></i> Files
                </a>
            </li>
            <hr />
            <li class="nav-item">
                <a class="nav-link link-danger" href="{{ route('auth.logout') }}">
                    <i class="bi bi-power"></i> Sign Out
                </a>
            </li>
        </ul>
    </div>
</div>

