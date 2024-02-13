<aside class="bg-stone-800 text-white px-5">
    <ul class="sticky top-0 py-3">
        <li>
            <x-admin-sidebar-link backend-driven="true" link="{{ route('pages.home') }}" target="_blank" class="hover:bg-sky-400/[.1] text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                  <path fill-rule="evenodd" d="M17 10a.75.75 0 0 1-.75.75H5.612l4.158 3.96a.75.75 0 1 1-1.04 1.08l-5.5-5.25a.75.75 0 0 1 0-1.08l5.5-5.25a.75.75 0 1 1 1.04 1.08L5.612 9.25H16.25A.75.75 0 0 1 17 10Z" clip-rule="evenodd" />
                </svg>
                To Site
            </x-admin-sidebar-link>
        </li>
        <hr class="opacity-30 my-3"/>
        @foreach($sidebarLinks as $sidebarLink)
            @empty($sidebarLink)
                <hr class="opacity-30 my-3"/>
                @continue
            @endif
            <x-admin-sidebar-link {{ $attributes->merge($sidebarLink->toArray()) }}>{{ $sidebarLink['text'] }}</x-admin-sidebar-link>
        @endforeach
        <hr class="opacity-30 my-3"/>
        <li>
            <x-admin-sidebar-link backend-driven="true" link="{{ route('auth.logout') }}" class="text-red-700 hover:bg-red-700/[.1]">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                  <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z" clip-rule="evenodd" />
                  <path fill-rule="evenodd" d="M19 10a.75.75 0 0 0-.75-.75H8.704l1.048-.943a.75.75 0 1 0-1.004-1.114l-2.5 2.25a.75.75 0 0 0 0 1.114l2.5 2.25a.75.75 0 1 0 1.004-1.114l-1.048-.943h9.546A.75.75 0 0 0 19 10Z" clip-rule="evenodd" />
                </svg>

                Sign Out
            </x-admin-sidebar-link>
        </li>
    </ul>
</aside>
