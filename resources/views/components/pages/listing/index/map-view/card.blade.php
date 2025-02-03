@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
        <div class="shadow-card bg-white border-rounded flex z-[999]">
            <div
                class="relative bg-cover bg-center bg-no-repeat w-full md:w-1/2 flex flex-col justify-between border-rounded p-2 h-[250px] xl:h-auto"
                style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}');"
            >
                <div class="absolute border-rounded inset-0 bg-gradient-50 "></div>
                <!-- Image Top -->
                <div class="flex justify-between items-center z-10">
                    @if ($hotel->tags)
                        <div class="flex items-center space-x-2">
                            @foreach($hotel->tags->take(2) as $tag)
                                <div class="card-tag-button bg-[#5A6BC9bb] hover:bg-[#c2c6dbbb]">
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

            <div class="hidden md:block md:w-1/2">
                <a href="{{ route('pages.listing.show', $hotel->slug) }}">
                    <div class="flex flex-col justify-between h-full text-[#505050] p-4 text-base md:text-lg xl:text-xl">
                        <div class="flex justify-between uppercase sm:font-bold xl:font-black">
                            <div>
                                <p>📍 {{ Str::limit($hotel->location, 10) }}</p>
                            </div>
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
