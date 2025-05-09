@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
        <div class="shadow-card bg-white border-rounded flex z-[999]">
            <div class="relative w-full md:w-1/2 flex flex-col justify-between p-2 h-[250px] xl:h-auto">
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
                <div class="flex justify-between items-center z-10">
                    @if ($hotel->tags)
                        <div class="flex items-center space-x-2">
                            @foreach($hotel->tags->take(2) as $index => $tag)
                                <a
                                    href="{{ route('pages.listing.index', ['tag' => $tag->id]) }}"
                                    class="card-tag-button bg-color-{{ $index + 1 }} bg-opacity-60 hover:bg-[#c2c6dbbb]"
                                >
                                    {{ Str::limit($tag->name, 10) }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex items-center space-x-2">
                        <button class="hidden">
                            <img
                                src="{{ asset('assets/images/icons/filter.svg') }}"
                                alt="filter"
                            />
                        </button>
                        <button
                            x-data="likeHandler({{ $hotel->id }}, @json($hotel->isLiked))"
                            @click="toggleLike"
                        >
                            <img
                                :src="isLiked ? '{{ asset('assets/images/icons/heart-red.svg') }}' : '{{ asset('assets/images/icons/heart.svg') }}'"
                                alt="like"
                            />
                        </button>
                    </div>
                </div>
                <!-- Image Bottom -->
                <a
                    href="{{ route('pages.listing.show', $hotel->slug) }}"
                    class="z-10"
                >
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
                </a>
            </div>

            <div class="hidden md:block md:w-1/2">
                <a href="{{ route('pages.listing.show', $hotel->slug) }}">
                    <div class="flex flex-col justify-between h-full text-[#505050] p-4 text-base md:text-lg xl:text-xl">
                        <div class="flex justify-between uppercase sm:font-bold xl:font-black">
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
                        <div>
                            <p>
                                {{ Str::limit($hotel->description, 200) }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endif

<script defer>
    function likeHandler(hotelId, initialIsLiked) {
        return {
            API_URI: `${hotelId}/like`,
            isLiked: initialIsLiked,

            async toggleLike() {
                try {
                    const { status } = await axios.post(this.API_URI, {}, {
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    });

                    if (status === 204) {
                        this.isLiked = false;
                    } else if (status === 201) {
                        this.isLiked = true;
                    }
                } catch (error) {
                    console.error('Error:', error.message);
                }
            },
        };
    }
</script>
