<header id="header">
    <nav class="container max-w-6xl mx-auto flex items-center px-3 max-h-20 py-3 bg-zinc-900">
        <div>
            <a class="" href="/">
                <img src="{{ $logo }}" alt="logo"  class="rounded size-6">
            </a>
        </div>
        <div class="ml-auto">
            <ul class="list-none flex gap-1">
                @foreach($links as $link)
                    <li>
                        @if($link['is_active'])
                            <div class="text-gray-500 px-1.5 py-3">{{ $link['text'] }}</div>
                        @else
                            <a class="block text-white hover:underline px-1.5 py-3"
                               aria-current="page"
                               href="{{ $link['link'] }}">{{ $link['text'] }}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>


