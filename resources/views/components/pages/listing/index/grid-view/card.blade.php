@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
        <div
            class="relative bg-cover bg-center bg-no-repeat flex flex-col justify-between border-rounded p-3 h-[220px] md:h-[300px] hover:shadow-xl transition-shadow duration-300"
            style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}');"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
            <!-- Image Top -->
            <div class="flex justify-between items-center z-10">
                @if ($hotel->tags)
                    <div class="flex items-center space-x-2">
                        @foreach($hotel->tags->take(2) as $tag)
                            <div class="card-tag-button random-bg-color">
                                {{ Str::limit($tag->name, 10) }}
                            </div>
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
                            :src="isLiked ? '{{ asset('assets/images/icons/heart-blue.svg') }}' : '{{ asset('assets/images/icons/heart.svg') }}'"
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
                <div class="flex justify-between items-center uppercase text-xs">
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
                            ${{ $hotel->price }}
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Bottom -->
        <div class="shadow-card border-rounded mt-[-54px] sm:mt-[-44px] px-3 sm:px-5 pt-[68px] pb-4 sm:pb-6 hover:shadow-lg transition-shadow duration-300">
            <div class="flex justify-between uppercase text-[#505050] text-sm  sm:font-bold md:font-black">
                <div>
                    <p>📍 {{ Str::limit($hotel->location, 20) }}</p>
                </div>
                <div class="flex justify-between space-x-6">
                    <p>🛏️ {{ $hotel->bedrooms }}</p>
                    <p>🛁 {{ $hotel->bathrooms }}</p>
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
