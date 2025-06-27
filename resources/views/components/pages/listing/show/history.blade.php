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
                        <div class="lg:w-[250px] lg:h-[250px] flex items-center justify-center flex-shrink-0 overflow-hidden">
{{--                            <img--}}
{{--                                src="{{ asset('assets/images/three-stars.png') }}"--}}
{{--                                alt="Three Stars"--}}
{{--                                class="absolute top-4 left-4"--}}
{{--                            />--}}
                            @if ($hotel->topic->logo)
                                <img
                                    src="{{ Helper::resolveImagePath($hotel->topic->logo) }}"
                                    alt="{{ $hotel->topic->title }}"
                                    class="lg:w-[230px] lg:h-[230px] object-cover aspect-square border-rounded"
                                />
                            @endif
                        </div>
                        <div class="lg:h-[250px]">
                            <div class="p-4 text-primary">
                                <h3 class="text-xl md:text-2xl font-bold md:font-black group-hover:text-secondary">
                                    {{ $hotel->topic->title }}
                                </h3>

                                <p class="mt-4 text-sm sm:text-base font-semibold group-hover:text-secondary">
                                    {{ Str::limit(Helper::removeHtmlTags($hotel->topic->body), 400) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
@endif
