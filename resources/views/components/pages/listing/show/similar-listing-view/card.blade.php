@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
        <a href="{{ route('pages.listing.show', $hotel->slug) }}">
            <div class="relative flex flex-col justify-between p-2 h-[200px]">
                <div class="absolute inset-0">
                    <img
                        data-src="{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}"
                        class="lazy-image"
                        alt="{{ $hotel->title }}"
                        loading="lazy"
                    />
                </div>
                <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                <!-- Image Top -->
                <div class="absolute">
                    @if ($hotel->tags)
                        <div class="flex items-center space-x-2">
                            @foreach($hotel->tags->take(2) as $index => $tag)
                                <a
                                    href="{{ route('pages.listing.index', ['tag' => $tag->id]) }}"
                                    class="card-tag-button bg-color-{{ $index + 1 }} bg-opacity-60 hover:text-primary"
                                >
                                    {{ Str::limit($tag->name, 10) }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
                <!-- Image Bottom -->
                <div class="flex text-white justify-between items-center uppercase sm:font-bold text-xs">
                    <p>
                        {{ Str::limit($hotel->title, 10) }}
                    </p>
                    <p>
                       ฿{{ $hotel->formatted_price }}
                    </p>
                </div>
            </div>
            <!-- Bottom -->
            <div class="shadow border-rounded mt-[-54px] sm:mt-[-44px] px-3 sm:px-5 pt-[68px] pb-4 sm:pb-6">
                <div class="flex justify-between uppercase text-[#505050] text-xs sm:font-bold md:font-black">
                    @if ($hotel->locations && $hotel->locations->first())
                        <div>
                            <p>📍 {{ Str::limit($hotel->locations->first()->name, 10) }}</p>
                        </div>
                    @endif
                    <div class="flex justify-between space-x-6">
                        <p>🛏️ {{ $hotel->bedrooms }}</p>
                        <p>🛁 {{ $hotel->bathrooms }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif
