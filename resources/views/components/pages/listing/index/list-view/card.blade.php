@props([
    'hotel' => null,
])

@if ($hotel)
    <div class="relative group">
        <a
            href="{{ route('pages.listing.show', $hotel->slug) }}"
            class="absolute inset-0 z-10">
        </a>
        <div class="shadow-card border-rounded flex transition-shadow duration-300 ease-in-out group-hover:shadow-xl">
            <div class="relative flex flex-col justify-between p-3 w-full h-[250px] sm:w-[30%]">
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
                                    class="card-tag-button bg-color-{{ $index + 1 }} bg-opacity-60 hover:text-primary"
                                >
                                    {{ Str::limit($tag->name, 10) }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex items-center space-x-2">
                        <button class="hidden">
                            <img src="{{ asset('assets/images/icons/filter.svg') }}" alt="filter" />
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
                            ฿{{ $hotel->formatted_price }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block w-[70%]">
                <div class="flex flex-col justify-between h-full text-[#505050] p-4 md:p-6 text-base md:text-lg xl:text-xl">
                    <div class="flex items-center space-x-2">
                        @if ($hotel->ie_verified)
                            <img class="w-6" src="{{ asset('assets/images/icons/verified.svg') }}" alt="verified" />
                        @endif
                        <h2 class="sm:font-bold xl:font-black group-hover:text-primary">
                            {{ $hotel->title }}
                        </h2>
                    </div>
                    <div>
                        <p class="group-hover:text-primary">
                            {{ Str::limit($hotel->description, 100) }}
                        </p>
                    </div>
                    <div class="flex space-x-4 sm:font-bold xl:font-black group-hover:text-primary">
                        @if ($hotel->locations && $hotel->locations->first())
                            <p>📍 {{ $hotel->locations->first()->name }}</p>
                        @endif
                        <p>🛏️ {{ $hotel->bedrooms }}</p>
                        <p>🛁 {{ $hotel->bathrooms }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<script defer>
    function likeHandler(hotelId, initialIsLiked) {
        return {
            API_URI: `listings/${hotelId}/like`,
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
