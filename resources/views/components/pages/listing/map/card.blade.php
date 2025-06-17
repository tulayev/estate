@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
        <div class="w-full shadow-card bg-white border-rounded flex z-[999]">
            <div class="relative w-1/2 flex flex-col justify-between p-2 h-[200px] md:h-[250px]">
                <div class="absolute inset-0">
                    <img
                        data-src="{{ Helper::resolveImagePath($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}"
                        class="lazy-image"
                        alt="{{ $hotel->title }}"
                        loading="lazy"
                    />
                </div>
                <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                <!-- Image Top -->
                <div class="flex justify-between items-center z-10">
                    @if ($hotel->tags)
                        <div class="flex items-center space-x-2">
                            @foreach($hotel->tags->take(1) as $index => $tag)
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
                    <div class="flex items-center space-x-2">
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
                            <img
                                class="w-6"
                                src="{{ asset('assets/images/icons/verified.svg') }}"
                                alt="verified"
                            />
                        @endif
                        <p class="text-white sm:font-bold">
                            {{ $hotel->title }}
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

            <div class="w-1/2">
                <div class="flex flex-col justify-between h-full text-[#505050] p-2 md:p-4 text-sm md:text-base xl:text-lg">
                    <div class="flex justify-between uppercase md:font-bold xl:font-black">
                        @if ($hotel->locations && $hotel->locations->first())
                            <div>
                                <p>📍 {{ Str::limit($hotel->locations->first()->name, 10) }}</p>
                            </div>
                        @endif
                        @php($floorDetails = $hotel->floor_with_minimum_bedrooms)
                        @if($floorDetails)
                            <div class="hidden md:flex justify-between space-x-6">
                                <p>🛏️ {{ $floorDetails->bedrooms }}</p>
                                <p>🛁 {{ $floorDetails->bathrooms }}</p>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p>
                            {{ Str::limit(Helper::removeHtmlTags($hotel->description), 100) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
