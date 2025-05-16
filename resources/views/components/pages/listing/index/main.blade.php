@props([
    'latestHotels' => null,
])

@if ($latestHotels)
    <main class="main-section relative">
        <div class="swiper listings-slider">
            <div class="swiper-wrapper">
                @foreach($latestHotels as $hotel)
                    <div class="swiper-slide">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-black/50"></div>
                        <img
                            class="w-full h-[250px] lg:h-[500px] xl:h-[750px]"
                            src="{{ $hotel->main_image_url ?? ImagePathResolver::resolve($hotel->main_image) ?? asset('assets/images/listings/index/listings-main-bg.png') }}"
                            alt="{{ $hotel->title }}"
                        />
                        <div class="px-10 container absolute-centralize">
                            <div class="main-wrapper">
                                <div class="flex flex-row items-left">
                                    <a
                                        href="{{ route('pages.listing.show', ['slug' => $hotel->slug]) }}"
                                        class="group"
                                    >
                                        <h1 class="main-title mt-2 lg:mt-10 group-hover:text-primary">
                                            {{ $hotel->title }}
                                        </h1>
                                    </a>
                                </div>

                                <div class="hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                                    <div class="pl-2 text-white">
                                        {!! Str::limit($hotel->description, 100) !!}
                                    </div>
                                </div>
                                @if ($hotel->tags)
                                    <div class="m-2 w-2/3 md:w-1/2 mt-4 md:mt-12 xl:mt-16">
                                        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0">
                                            @foreach($hotel->tags->take(3) as $index => $tag)
                                                <div>
                                                    <a
                                                        href="{{ route('pages.listing.index', ['tag' => $tag->id]) }}"
                                                        class="secondary-button bg-color-{{ $index + 1 }}"
                                                    >
                                                        <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">{{ $tag->name }}</span>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Swiper Pagination -->
            <div class="swiper-pagination mb-2 md:mb-8 xl:mb-12"></div>
        </div>

        <!-- Search -->
        <x-layout.listing.search />
    </main>
@endif
