@props([
    'hotel' => null,
])

@if ($hotel)
    <div class="relative group">
        <a
            href="{{ route('pages.listing.show', $hotel->slug) }}"
            class="absolute inset-0 z-10">
        </a>
        <div class="shadow-card border-rounded flex transition-shadow duration-300 ease-in-out group-hover:shadow-xl h-[150px] md:h-[170px] lg:h-[200px] xxl:h-[250px]">
            <div class="relative flex flex-col justify-between p-2 lg:p-3 w-full sm:w-[40%] lg:w-[30%] overflow-hidden">
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
                <div class="absolute inset-0 transition-opacity duration-500 group-hover:opacity-0">
                    <img
                        data-src="{{ Helper::resolveImagePath($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}"
                        alt="{{ $hotel->title }}"
                        class="lazy-image"
                        loading="lazy"
                    />
                </div>
                <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                <!-- Image Top -->
                <div class="relative z-10">
                    <!-- Tags (Left side) -->
                    @if ($hotel->tags)
                        <div class="flex items-center space-x-2 opacity-100 group-hover:opacity-0 transition-opacity duration-300">
                            @foreach($hotel->tags->take(2) as $index => $tag)
                                <a
                                    href="{{ route('pages.listing.index', ['tag' => $tag->id]) }}"
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
                <div class="flex justify-between items-center uppercase text-sm">
                    <div class="flex items-center space-x-2">
                        @if ($hotel->ie_verified)
                            <img class="w-6" src="{{ asset('assets/images/icons/verified.svg') }}" alt="verified" />
                        @endif
                        <p class="text-white sm:font-bold group-hover:text-primary">
                            {{ Str::limit($hotel->title, 20) }}
                        </p>
                    </div>
                    <div>
                        <span class="text-white sm:font-bold group-hover:text-primary">
                            @php($converted = Helper::getCurrencyConvertedValue($hotel->price))
                            {{ $converted['symbol'] . ' ' . $converted['value'] }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block sm:w-[60%] lg:w-[70%]">
                <div class="flex flex-col justify-around md:justify-between h-full text-[#505050] p-2 md:p-4 text-sm md:text-base xxl:text-lg">
                    <div class="flex items-center space-x-2">
                        @if ($hotel->ie_verified)
                            <img
                                class="w-6"
                                src="{{ asset('assets/images/icons/verified.svg') }}"
                                alt="verified"
                            />
                        @endif
                        <h2 class="sm:font-bold xl:font-black group-hover:text-primary">
                            {{ $hotel->title }}
                        </h2>
                    </div>
                    <div class="hidden md:block">
                        <p class="group-hover:text-primary">
                            {{ Str::limit(Helper::removeHtmlTags($hotel->description), 100) }}
                        </p>
                    </div>
                    <div class="flex justify-between sm:font-bold xl:font-black group-hover:text-primary">
                        <div class="flex space-x-4">
                            @if ($hotel->locations && $hotel->locations->first())
                                <p>📍 {{ $hotel->locations->first()->name }}</p>
                            @endif
                            @php($floorDetails = $hotel->floor_with_minimum_bedrooms)
                            @if($floorDetails)
                                <p>🛏️ {{ $floorDetails->bedrooms }}</p>
                                <p>🛁 {{ $floorDetails->bathrooms }}</p>
                            @endif
                        </div>
                        <div>
                            <p>
                                @php($converted = Helper::getCurrencyConvertedValue($hotel->price))
                                {{ $converted['symbol'] . ' ' . $converted['value'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
