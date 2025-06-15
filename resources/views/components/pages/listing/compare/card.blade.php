@props([
    'hotel' => null,
])

@if ($hotel)
    <div class="relative group">
        <a
            href="{{ route('pages.listing.show', $hotel->slug) }}"
            class="absolute inset-0 z-10">
        </a>
        <div class="relative shadow-card border-rounded flex flex-col justify-between p-2 lg:p-3 w-[305px] h-[205px]">
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
            <div class="flex justify-between items-center z-10">
                @if ($hotel->tags)
                    <div class="flex items-center space-x-2">
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
                <div class="flex items-center space-x-2">
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
