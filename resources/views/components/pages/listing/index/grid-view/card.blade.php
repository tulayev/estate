@props([
    'hotel' => null,
])

@if ($hotel)
    <div class="relative group">
        <a
            href="{{ route('pages.listing.show', $hotel->slug) }}"
            class="absolute inset-0 z-10">
        </a>
        <div class="relative flex flex-col justify-between p-3 h-[220px] md:h-[300px] hover:shadow-xl transition-shadow duration-300 border-rounded overflow-hidden">
            <!-- Swiper Slider (Initially Hidden) -->
            @if ($hotel->gallery || $hotel->gallery_url)
                <div class="swiper listing-slider absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none border-rounded overflow-hidden">
                    <div class="swiper-wrapper">
                        @if ($hotel->gallery)
                            @foreach($hotel->gallery as $image)
                                <div class="swiper-slide">
                                    <img
                                        src="{{ Helper::resolveImagePath($image) }}"
                                        class="w-full h-full object-cover"
                                        alt="{{ $hotel->title }}"
                                        loading="lazy"
                                    />
                                </div>
                            @endforeach
                        @elseif ($hotel->gallery_url)
                            @foreach(Helper::splitString($hotel->gallery_url, ';') as $image)
                                <div class="swiper-slide">
                                    <img
                                        src="{{ $image }}"
                                        class="w-full h-full object-cover"
                                        alt="{{ $hotel->title }}"
                                        loading="lazy"
                                    />
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Prev & Next Buttons -->
                    <div class="swiper-button-prev text-secondary font-black hover:text-primary z-30 pointer-events-auto"></div>
                    <div class="swiper-button-next text-secondary font-black hover:text-primary z-30 pointer-events-auto"></div>
                </div>
            @endif
            <!-- Static Background (Visible Until Hover) -->
            <div class="absolute inset-0 transition-opacity duration-500 group-hover:opacity-0 border-rounded overflow-hidden">
                <img
                    src="{{ asset('assets/images/object-background.png') }}"
                    data-src="{{ Helper::resolveImagePath($hotel->main_image) ?? $hotel->main_image_url }}"
                    class="lazy-image w-full h-full object-cover"
                    alt="{{ $hotel->title }}"
                    loading="lazy"
                />
            </div>
            <!-- Gradient Overlay -->
            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
            <!-- Tags -->
            <div class="relative z-20">
                <!-- Tags (Left side) -->
                @if ($hotel->tags)
                    <div class="flex items-center space-x-2 opacity-100 group-hover:opacity-0 transition-opacity duration-300">
                        @foreach($hotel->tags->take(2) as $index => $tag)
                            <a
                                href="{{ route('pages.listing.index', ['tag' => $tag->id]) }}"
                                @click.stop
                                class="card-tag-button {{ $tag->color_ui_tag ? 'card-tag-button-bg' : 'bg-color-'.($index + 1) }} bg-opacity-60 hover:text-primary"
                                style="{{ $tag->color_ui_tag ? '--tag-bg-color: '.$tag->color_ui_tag.';' : '' }}"
                            >
                                {{ Str::limit($tag->name, 10) }}
                            </a>
                        @endforeach
                    </div>
                @endif
                <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center space-x-2 absolute top-0 right-0 z-30">
                    <x-ui.buttons.compare-button
                        :hotelId="$hotel->id"
                    />

                    <x-ui.buttons.like-button
                        baseUrl="listings"
                        :id="$hotel->id"
                        :is-liked="$hotel->is_liked"
                    />
                </div>
            </div>
            <!-- Image Bottom -->
            <div class="flex justify-between items-center uppercase text-xs z-20 pb-2 relative">
                <div class="flex items-center space-x-2">
                    @if ($hotel->ie_verified)
                        <img
                            class="w-6"
                            src="{{ asset('assets/images/icons/verified.svg') }}"
                            alt="verified"
                        />
                    @endif
                    <p class="text-white sm:font-bold">
                        {{ Str::limit($hotel->title, 20) }}
                    </p>
                </div>
                <div>
                    <span class="text-white sm:font-bold">
                        @php($converted = Helper::getCurrencyConvertedValue($hotel->price))
                        {{ $converted['symbol'] . ' ' . $converted['value'] }}
                    </span>
                </div>
            </div>
        </div>
        <!-- Bottom -->
        <div class="shadow-card border-rounded mt-[-54px] sm:mt-[-44px] px-3 sm:px-5 pt-[68px] pb-4 sm:pb-6 group-hover:shadow-xl transition-shadow duration-300 relative">
            <div class="flex justify-between uppercase text-[#505050] text-sm sm:font-bold md:font-black group-hover:text-primary">
                @if ($hotel->locations && $hotel->locations->first())
                    <div>
                        <p>📍 {{ Str::limit($hotel->locations->first()->name, 20) }}</p>
                    </div>
                @endif
                @php($floorDetails = $hotel->floor_with_minimum_bedrooms)
                @if($floorDetails)
                    <div class="flex justify-between space-x-6">
                        <p>🛏️ {{ $floorDetails->bedrooms }}</p>
                        <p>🛁 {{ $floorDetails->bathrooms }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
