@php /** @var Illuminate\Support\Collection<int, App\Data\Database\Eloquent\Models\ExperienceModel> $experiences */ @endphp
<section id="experience" class="max-w-6xl mx-auto">
    <ol class="group/list relative space-y-3">
        @foreach($experiences as $experience)

            <li class="rounded-xl relative z-[3]">
                <div class="group relative grid grid-cols-1 gap-3 md:grid-cols-8 lg:hover:!opacity-100 lg:group-hover/list:opacity-50 duration-300">

                    <div class="absolute -inset-px z-0 hidden rounded-xl transition motion-reduce:transition-none lg:block lg:group-hover:bg-gray-100/[.1] lg:group-hover:shadow-[inset_0_1px_0_0_rgba(148,163,184,0.1)] lg:group-hover:drop-shadow-lg duration-300"></div>


                    <div class="col-span-6 bg-night rounded-xl p-6 z-[3] block">
                        <div class="mb-3">
                            <h3 class="text-gray-50 text-2xl font-bold leading-snug">
                                <a href="{{ $experience->company_url }}"
                                   target="_blank"
                                   class="font-bold inline-flex gap-1 items-baseline leading-tight hover:text-blue-500 focus-visible:text-blue-500 group/link">
                                    <span class="absolute -inset-x-4 -inset-y-2.5 hidden rounded md:-inset-x-6 md:-inset-y-4 lg:block"></span>
                                    <span>
                                        {{ $experience->position }} ·
                                        <span class="whitespace-nowrap">
                                            {{$experience->company_name}}
                                            <x-heroicon-o-arrow-up-right class="inline-block size-5 shrink-0 transition-transform group-hover/link:-translate-y-1 group-hover/link:translate-x-1 group-focus-visible/link:-translate-y-1 group-focus-visible/link:translate-x-1 motion-reduce:transition-none ml-1 translate-y-px"/>
                                        </span>
                                    </span>

                                </a>
                            </h3>
                        </div>
                        <div class="text-sm text-gray-400 mb-1">Stack:</div>
                        <div class="flex flex-wrap gap-1.5 mb-3">
                            @foreach($experience->tools as $tool)
                                <span class="px-4 p-1 border rounded-md border-stone-200 bg-stone-300 text-stone-700 text-sm">{{ $tool->name }}</span>
                            @endforeach
                        </div>
                        <div class="text-lg text-white">
                            <p>{!! $experience->description !!}</p>
                        </div>
                    </div>

                    <header class="col-span-2 text-2xl font-black text-gray-100 md:p-6 hidden md:block uppercase" aria-label="{{ $experience?->started_at?->year ?? now()->year }} to {{ $experience?->ended_at?->year ?? 'now' }}">
{{--                        <div class="bg-gray-50 shadow-xl rounded-full max-w-36 p-6 mb-6">--}}
{{--                            <img class="block w-full height-auto"--}}
{{--                                 src="{{ $experience?->company_logo }}"--}}
{{--                                 alt="{{ $experience->company_name }}">--}}
{{--                        </div>--}}

                        <div>{{ $experience?->started_at?->year ?? now()->year }} - {{ $experience?->ended_at?->year ?? 'Now' }}</div>
                    </header>
                </div>

            </li>
        @endforeach

    </ol>


</section>
