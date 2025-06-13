@props([
    'hotel' => null,
])

@if ($hotel && $hotel->topic)
    <section class="section">
        <div class="container">
            <div class="shadow-card bg-white rounded-[28px]">
                <div class="flex flex-col lg:flex-row items-center relative">
                    <div class="w-full">
{{--                        <img--}}
{{--                            src="{{ asset('assets/images/three-stars.png') }}"--}}
{{--                            alt="Three Stars"--}}
{{--                            class="absolute top-4 left-4"--}}
{{--                        />--}}
                        @if ($hotel->topic->logo)
                            <img
                                src="{{ Helper::resolveImagePath($hotel->topic->logo) }}"
                                alt="{{ $hotel->topic->title }}"
                                class="mx-auto"
                            />
                        @endif
                    </div>
                    <div class="p-2 md:p-4 xl:p-6">
                        <p class="text-primary text-sm sm:text-base md:text-lg xl:text-xl">
                            {{ Str::limit(Helper::removeHtmlTags($hotel->topic->body), 200) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
