@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
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
                <div class="space-y-2 text-white text-sm sm:text-base md:text-lg">
                    <div class="flex justify-between items-center uppercase">
                        <div class="flex items-center space-x-2">
                            <img
                                class="w-6"
                                src="{{ asset('assets/images/icons/verified.svg') }}"
                                alt="verified"
                            />
                            <p class="sm:font-bold">
                                {{ $hotel->title }}
                            </p>
                        </div>
                        <div>
                        <span class="sm:font-bold">
                            ${{ $hotel->price }}
                        </span>
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
