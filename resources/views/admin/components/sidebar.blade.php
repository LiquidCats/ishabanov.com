<aside class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">iShabanov</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                @foreach($sidebarLinks as $sidebarLink)
                    @empty($sidebarLink)
                        <hr />
                        @continue
                    @endif
                    <x-admin-sidebar-link
                        type="{{ $sidebarLink['type'] }}"
                        link="{{ $sidebarLink['link'] }}"
                        icon="{{ $sidebarLink['icon'] }}">{{ $sidebarLink['text'] }}</x-admin-sidebar-link>
                @endforeach
            </ul>
        </div>
    </div>
</aside>
