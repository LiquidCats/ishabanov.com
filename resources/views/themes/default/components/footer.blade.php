<footer id="footer" class="bg-black text-white sticky-bottom z-0">
    <div class="container py-4">
        <div class="row">
            <div class="col">
                <a href="/">
                    <img alt="logo" src="{{ $logo }}" class="rounded" width="32">
                </a>

            </div>
            <div class="col-auto">
                <div class="d-flex align-items-end">
                    <div class="px-3">
                        @foreach($socials as $social)
                        <div>
                            <a href="{{ $social['link'] }}" target="_blank" class="text-white text-decoration-none">
                                <i class="bi bi-{{ $social['icon'] }}"></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="px-3" style="border-left: solid 3px var(--bs-white)">
                        <div style="color: var(--bs-gray-600)">Menu</div>
                        @foreach($links as $link)
                        <div><a href="{{ $link['link'] }}" class="text-decoration-none text-white">{{ $link['text'] }}</a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>

