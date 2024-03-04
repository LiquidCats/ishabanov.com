<section id="hero" class="container relative max-w-6xl mx-auto min-h-screen grid grid-cols-1 gap-3 mb-3 overflow-x-clip">
    <div class="absolute t-0 l-0 z-[1] hidden md:block mt-6">
        <span class="text-gray-500 text-[12rem] font-black leading-[8rem] uppercase">Software <br/>Engineer</span>
    </div>
    <div class="z-10 md:mt-64 grid grid-cols-3 md:grid-cols-6 md:grid-rows-6 gap-3">
        <div class="col-span-3 md:row-span-4 p-5 bg-night flex flex-col justify-end items-center gap-3 rounded-xl">
            <img src="{{ asset('images/hero/computer.png') }}" alt="computer" class="w-full h-auto max-w-48">
            <div class="text-white text-xl">
                Passionate Coder, Tech Maestro, and Innovator. From music to fintech, I've coded it all using
                Go, PHP, JavaScript, Docker, Kubernetes, and more. Have a project or a groundbreaking idea? Let's connect and
                bring it to life!
            </div>
        </div>
        <div class="col-span-3 md:row-span-5 bg-gradient-to-l from-blue-500 to-blue-900 rounded-xl overflow-hidden flex justify-end items-end">
            <img src="{{ asset('images/hero/person.png') }}" alt="person" class="block w-full max-w-md h-auto">
        </div>
        <div class="md:row-span-2 p-5 bg-blue-800 flex flex-col justify-end items-center rounded-xl text-white">
            <span class="text-9xl font-bold">{{ $duration }}</span>
            <span class="text-xl font-bold">years</span>
            <span class="text-xl font-bold -mt-1">in IT</span>
        </div>
        <div class="col-span-2 md:row-span-2 p-5 bg-gray-50 flex flex-col justify-start items-center gap-3 rounded-xl">
            <div class="text-xl">Unveil the Secrets to Success: Explore My Exclusive Insights and Expert Tips!</div>
            <a href="{{ route('pages.blog') }}" class="ml-auto border border-gray-100 p-5 block shadow-md rounded-full hover:bg-gray-200 hover:border-gray-200 duration-300 mt-auto">
                <x-heroicon-m-chevron-right class="size-6"/>
            </a>
        </div>
        @foreach($socials as $social)
            <div class="bg-gradient-to-tl from-blue-500 to-purple-500 rounded-md justify-center flex items-center">
                 <a href="{{ $social['link'] }}" target="_blank" class="text-white py-3 duration-300 flex flex-col items-center justify-center gap-1 text-md">
                    @svg('heroicon-o-'. $social['icon'], 'size-7')
                    {{ $social['text'] }}
                </a>
            </div>

        @endforeach
    </div>

</section>

