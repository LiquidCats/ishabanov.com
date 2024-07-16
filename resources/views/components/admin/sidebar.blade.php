<ul class="sticky top-0 py-3 list-none sidenav">
    <x-admin-sidebar-link icon="arrow-uturn-left"
                          backend-driven="true"
                          link="{{ route('pages.home') }}"
                          target="_blank"
                          class="hover:bg-sky-400/[.1]">
        <span>To Site</span>
    </x-admin-sidebar-link>
    <hr class="opacity-30 my-3"/>
    @foreach($sidebarLinks as $sidebarLink)
        @empty($sidebarLink)
            <hr class="opacity-30 my-3"/>
            @continue
        @endif
        <x-admin-sidebar-link {{ $attributes->merge($sidebarLink->toArray()) }} class="hover:bg-slate-50/[.1]">{{ $sidebarLink['text'] }}</x-admin-sidebar-link>
    @endforeach
    <hr class="opacity-30 my-3"/>
    <x-admin-sidebar-link icon="arrow-left-start-on-rectangle"
                          backend-driven="true"
                          link="{{ route('auth.logout') }}"
                          class="text-red-700 hover:bg-red-700/[.1]">
        Sign Out
    </x-admin-sidebar-link>
</ul>
