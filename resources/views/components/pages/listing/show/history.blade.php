@props([
    'hotel' => null,
])

@if ($hotel && $hotel->topic)
    <section class="section">
        <div class="container">
            <a
                href="{{ route('pages.insight.show', ['slug' => $hotel->topic->slug]) }}"
                class="group"
            >
                <div class="shadow-card bg-white border-rounded">
                    <div class="flex flex-col lg:flex-row items-center relative">
                        <div class="w-full lg:w-2/5 h-auto lg:h-[250px] flex items-center justify-center">
{{--                            <img--}}
{{--                                src="{{ asset('assets/images/three-stars.png') }}"--}}
{{--                                alt="Three Stars"--}}
{{--                                class="absolute top-4 left-4"--}}
{{--                            />--}}
                            @if ($hotel->topic->logo)
                                <img
                                    src="{{ Helper::resolveImagePath($hotel->topic->logo) }}"
                                    alt="{{ $hotel->topic->title }}"
                                    class="border-rounded w-full h-full object-contain"
                                />
                            @endif
                        </div>
                        <div class="w-full lg:w-3/5 h-auto lg:h-[250px]">
                            <div class="p-4 text-primary">
                                <h3 class="text-lg sm:text-xl font-bold group-hover:text-secondary">
                                    {{ $hotel->topic->title }}
                                </h3>

                                <p class="mt-4 text-sm sm:text-base font-semibold group-hover:text-secondary">
                                    {{ Str::limit(Helper::removeHtmlTags($hotel->topic->body), 200) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
@endif
