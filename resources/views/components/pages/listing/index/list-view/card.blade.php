@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
        <div class="shadow-card border-rounded flex">
            <div class="relative bg-cover bg-center bg-no-repeat flex flex-col justify-between border-rounded p-3 w-full h-[250px] sm:w-[30%]"
                 style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}');">
                <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                <!-- Image Top -->
                <div class="flex justify-between items-center z-10">
                    @if ($hotel->tags)
                        <div class="flex items-center space-x-2">
                            @foreach($hotel->tags->take(2) as $tag)
                                <div class="card-tag-button random-bg-color">
                                    {{ Str::limit($tag->name, 3) }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="flex items-center space-x-2">
                        <button class="hidden">
                            <img src="{{ asset('assets/images/icons/filter.svg') }}" alt="filter" />
                        </button>
                        <button x-data="likeHandler({{ $hotel->id }}, @json($hotel->isLiked))" @click="toggleLike">
                            <img :src="isLiked ? '{{ asset('assets/images/icons/heart-blue.svg') }}' : '{{ asset('assets/images/icons/heart.svg') }}'" alt="like" />
                        </button>
                    </div>
                </div>
                <!-- Image Bottom -->
                <a href="{{ route('pages.listing.show', $hotel->slug) }}" class="z-10">
                    <div class="flex justify-between items-center uppercase text-sm sm:text-base md:text-lg">
                        <div class="flex items-center space-x-2">
                            @if ($hotel->ie_verified)
                                <img class="w-6" src="{{ asset('assets/images/icons/verified.svg') }}" alt="verified" />
                            @endif
                            <p class="text-white sm:font-bold">
                                {{ Str::limit($hotel->title, 5) }}
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

            <div class="hidden sm:block w-[70%]">
                <a href="{{ route('pages.listing.show', $hotel->slug) }}">
                    <div class="flex flex-col justify-between h-full text-[#505050] p-4 md:p-6 text-base md:text-lg xl:text-xl">
                        <div class="flex items-center space-x-2">
                            @if ($hotel->ie_verified)
                                <img class="w-6" src="{{ asset('assets/images/icons/verified.svg') }}" alt="verified" />
                            @endif
                            <h2 class="sm:font-bold xl:font-black">
                                {{ $hotel->title }}
                            </h2>
                        </div>
                        <div>
                            <p>
                                {{ Str::limit($hotel->description, 100) }}
                            </p>
                        </div>
                        <div class="flex space-x-4 sm:font-bold xl:font-black">
                            <p>📍 {{ $hotel->location }}</p>
                            <p>🛏️ {{ $hotel->bedrooms }}</p>
                            <p>🛁 {{ $hotel->bathrooms }}</p>
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
