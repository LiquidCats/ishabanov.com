@php /** @var Illuminate\Support\Collection<int, App\Data\Database\Eloquent\Models\ExperienceModel> $experiences */ @endphp
<section id="experience" class="max-w-6xl mx-auto">
    <h2 class="text-3xl md:text-6xl font-black text-gray-300">I worked in</h2>
    @foreach($experiences as $experience)
        <div>
            <a href="{{ $experience->company_url }}"
               class="text-gray-300 text-5xl md:text-8xl font-black inline-flex items-baseline gap-1">
                <x-heroicon-o-arrow-top-right-on-square class="size-16"/> {{$experience->company_name}}
            </a>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

                <div class="col-span-3 bg-night p-6 rounded-xl z-[2]">
                    <div class="mb-3">
                        <h2 class="text-gray-50 text-5xl font-bold">{{ $experience->position }}</h2>
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

                <div class="md:flex md:flex-col md:justify-center md:items-center hidden bg-blue-500 rounded-xl py-6 z-[1]">
                    <div class="flex items-center justify-center size-32 bg-white p-6 rounded-full mb-3 shadow-xl">
                        <img class="block"
                             src="{{ asset($experience->company_logo) }}"
                             alt="{{ $experience->company_name }}">
                    </div>
                    <span class="text-5xl text-stone-50 font-black leading-10">{{ $experience?->started_at?->year ?? now()->year }}</span>
                    <span class="text-5xl text-stone-50 font-black leading-10">{{ $experience?->ended_at?->year ?? now()->year }}</span>
                </div>


            </div>
        </div>
    @endforeach
</section>
