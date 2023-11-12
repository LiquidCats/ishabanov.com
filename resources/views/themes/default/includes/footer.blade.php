<footer id="footer" class="bg-black text-white sticky-bottom z-0">
    <div class="container py-4">
        <div class="row">
            <div class="col">
                <a href="{{ route('pages.home') }}">
                    <img alt="logo" src="{{ asset('images/logo.svg') }}" class="rounded" width="32">
                </a>

            </div>
            <div class="col-auto">
                <div class="d-flex align-items-end">
                    <div class="px-3">
                        <div>
                            <a href="https://www.instagram.com/degradation.of.mine" target="_blank" class="text-white text-decoration-none">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </div>
                        <div>
                            <a href="https://www.linkedin.com/in/ilia-shabanov" target="_blank" class="text-white text-decoration-none">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                        <div>
                            <a href="https://github.com/LiquidCats" target="_blank" class="text-white text-decoration-none">
                                <i class="bi bi-github"></i>
                            </a>
                        </div>
                    </div>
                    <div class="px-3" style="border-left: solid 3px var(--bs-white)">
                        <div style="color: var(--bs-gray-600)">Menu</div>
                        <div><a href="{{ route('pages.home') }}" class="text-decoration-none text-white">Home</a></div>
                        <div><a href="{{ route('pages.blog') }}" class="text-decoration-none text-white">Posts</a></div>
                        <div><a href="{{ route('pages.about') }}" class="text-decoration-none text-white">About</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>
