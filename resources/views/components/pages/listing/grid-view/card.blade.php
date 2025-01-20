@props([
    'hotel' => null,
    'likedHotels' => null,
])

@if ($hotel)
    <div
        x-data="likeHandler({{ $hotel->id }}, {{ $likedHotels->pluck('hotel_id')->contains($hotel->id) ? 'true' : 'false' }})"
    >
        <div
            class="relative bg-cover bg-center bg-no-repeat flex flex-col justify-between border-rounded p-3 h-[300px]"
            style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_old ?? asset('assets/images/object-background.png') }}');"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
            <!-- Image Top -->
            <div class="flex justify-between items-center z-10">
                @if ($hotel->tags)
                    <div class="flex items-center space-x-2">
                        @foreach($hotel->tags->take(2) as $tag)
                            <div class="card-tag-button bg-[#5A6BC9bb]">
                                {{ Str::limit($tag->name, 3) }}
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="flex items-center space-x-2">
                    <button>
                        <img
                            src="{{ asset('assets/images/icons/filter.svg') }}"
                            alt="filter"
                        />
                    </button>
                    <button @click="toggleLike">
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
                <div class="flex justify-between items-center uppercase text-sm sm:text-base md:text-lg">
                    <div class="flex items-center space-x-2">
                        <img
                            class="w-6"
                            src="{{ asset('assets/images/icons/verified.svg') }}"
                            alt="verified"
                        />
                        <p class="text-white sm:font-bold">
                            {{ $hotel->title }}
                        </p>
                    </div>
                    <div>
                        <span class="text-white sm:font-bold">
                            ${{ $hotel->price }}
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Bottom -->
        <div class="shadow-card border-rounded mt-[-54px] sm:mt-[-44px] px-3 sm:px-5 pt-[68px] pb-4 sm:pb-6">
            <div class="flex justify-between uppercase text-[#505050] text-sm sm:text-base md:text-lg xl:text-xl sm:font-bold md:font-black">
                <div>
                    <p>📍 {{ Str::limit($hotel->location, 10) }}</p>
                </div>
                <div class="flex justify-between space-x-6">
                    <p>🛏️ {{ $hotel->bedrooms }}</p>
                    <p>🛁 {{ $hotel->bathrooms }}</p>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    function likeHandler(hotelId, initialState) {
        return {
            isLiked: initialState,

            async toggleLike() {
                try {
                    const response = await fetch(`/listings/${hotelId}/like`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                    });

                    if (response.ok) {
                        const data = await response.json();
                        if (data.message === 'Like removed successfully') {
                            this.isLiked = false;
                        } else if (data.message === 'Object liked successfully') {
                            this.isLiked = true;
                        }
                    } else {
                        console.error('Failed to toggle like.');
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            },
        };
    }
</script>
