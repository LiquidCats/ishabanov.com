<footer id="footer">
    <div class="container max-w-6xl my-6 mx-auto flex justify-between px-3">
        <div>
            <div class="flex items-start">
                <div class="px-3 min-w-24 md:min-w-32 gap-1.5">
                    <div class="mb-3 text-gray-500">Menu</div>
                    @foreach($links as $link)
                        <div><a href="{{ $link['link'] }}" class="hover:underline text-white">{{ $link['text'] }}</a></div>
                    @endforeach
                </div>
                <div class="px-3 min-w-24 md:min-w-32 gap-1.5">
                    <div class="mb-3 text-gray-500">Contacts</div>
                    @foreach($socials as $social)
                        <div>
                            <a href="{{ $social['link'] }}" target="_blank" class="hover:underline flex items-center gap-1 text-white">
                                @svg('heroicon-o-'. $social['icon'], 'size-4')
                                {{ $social['text'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-between items-end gap-1">
            <a href="/">
                <img alt="logo" src="{{ $logo }}" class="rounded size-8">

            </a>
            <span class="text-gray-500">&copy; Ilia Shabanov</span>
        </div>
    </div>
</footer>

