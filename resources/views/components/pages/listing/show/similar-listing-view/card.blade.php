@props([
    'hotel' => null,
])

@if ($hotel)
    <div>
        <a
            href="{{ route('pages.listing.show', $hotel->slug) }}"
            class="z-10"
        >
            <div
                class="relative bg-cover bg-center bg-no-repeat flex flex-col justify-between border-rounded p-2 h-[200px]"
                style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}');"
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
                </div>
                <!-- Image Bottom -->
                <div class="flex text-white justify-between items-center uppercase sm:font-bold text-sm sm:text-base md:text-lg">
                    <p>
                        {{ Str::limit($hotel->title, 5) }}
                    </p>
                    <p>
                        ${{ $hotel->price }}
                    </p>
                </div>
            </div>
            <!-- Bottom -->
            <div class="shadow-card border-rounded mt-[-54px] sm:mt-[-44px] px-3 sm:px-5 pt-[68px] pb-4 sm:pb-6">
                <div class="flex justify-between uppercase text-[#505050] text-sm sm:text-base md:text-lg xl:text-xl sm:font-bold md:font-black">
                    <div>
                        <p>📍 {{ Str::limit($hotel->location, 5) }}</p>
                    </div>
                    <div class="flex justify-between space-x-6">
                        <p>🛏️ {{ $hotel->bedrooms }}</p>
                        <p>🛁 {{ $hotel->bathrooms }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
@endif
