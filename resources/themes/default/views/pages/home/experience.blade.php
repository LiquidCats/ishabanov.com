@php /** @var Illuminate\Support\Collection<int, App\Data\Database\Eloquent\Models\ExperienceModel> $experiences */ @endphp
<section id="experience" class="container max-w-6xl mx-auto px-3 grid grid-cols-1 md:grid-cols-3 gap-x-3 gap-y-16 py-8 md:gap-y-48 md:py-48 overflow-clip">
    @foreach($experiences as $experience)
        <div id="experience-card" class="z-[2] md:col-span-2 grid grid-cols-1 relative">
            <h2 class="text-gray-300 text-7xl md:text-8xl font-black">
                {{$experience->company_name}}
            </h2>
            <div class="z-[1] bg-night p-6 rounded-xl relative">
                <div class="mb-3">
                    <h2 class="text-gray-50 text-5xl font-bold">{{ $experience->position }}</h2>
                    <a href="{{ $experience->company_url }}"
                       target="_blank"
                       class="text-gray-300 inline-flex items-center gap-1 my-2 text-xl">
                        <x-heroicon-o-arrow-top-right-on-square class="size-5"/>{{ $experience->company_name }}</a>
                </div>
                <div class="flex flex-wrap gap-1.5 mb-3">
                    @foreach($experience->tools as $tool)
                        <span class="px-4 p-1 border rounded-md border-stone-200 bg-stone-300 text-stone-700 text-sm">{{ $tool->name }}</span>
                    @endforeach
                </div>
                <div class="text-lg text-white">
                    <p>{!! $experience->description !!}</p>
                </div>
            </div>
        </div>
        <div id="experience-logo" class="z-[1] md:flex md:flex-col md:justify-center md:items-center hidden">
            <div class="flex items-center justify-center size-48 bg-white p-6 rounded-full mb-3 shadow-xl">
                <img class="block"
                     src="{{ asset($experience->company_logo) }}"
                     alt="{{ $experience->company_name }}">
            </div>
            <span class="text-5xl text-stone-50 font-black leading-10">{{ $experience?->started_at?->year ?? now()->year }}</span>
            <span class="text-5xl text-stone-50 font-black leading-10">{{ $experience?->ended_at?->year ?? now()->year }}</span>
        </div>
    @endforeach
</section>
