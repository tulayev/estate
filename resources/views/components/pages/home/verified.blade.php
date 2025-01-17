@props([
    'hotels' => null,
])

<section class="section">
    <div class="container">
        <h2 class="section-title mb-10 xl:mb-20 flex items-center space-x-3">
            <img
                class="w-[30px] sm:w-[50px]"
                src="{{ asset('assets/images/icons/verified.svg') }}"
                alt="verified"
            />
            <span>ie verified</span>
        </h2>
    </div>
    <div class="container pb-10 sm:pb-24">
        <div class="mt-10 uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
            <div>
                <div
                    class="relative text-white rounded-lg sm:border-rounded h-full"
                    style="background-image: url('{{ asset('assets/images/verified_1.png') }}'); background-repeat: no-repeat; background-size: cover;"
                >
                    <div class="rounded-lg sm:border-rounded absolute inset-0 bg-[#0F1F3DE5] opacity-90"></div>
                    <div class="relative px-2 sm:px-4 xl:px-11 py-2 sm:py-4 xl:py-8">
                        <h4 class="font-bold uppercase text-white text-sm sm:text-lg xl:text-3xl">
                            for investors
                        </h4>
                        <p class="mt-2 xl:mt-4 text-xs sm:text-base lg:text-xl">
                            “Data & Quality Mark You Can Trust.”<br>
                            We do the research.<br>
                            You get the facts, clarity & best terms.
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div
                    class="relative text-white rounded-lg sm:border-rounded h-full"
                    style="background-image: url('{{ asset('assets/images/verified_2.png') }}'); background-repeat: no-repeat; background-size: cover;"
                >
                    <div class="rounded-lg sm:border-rounded absolute inset-0 bg-[#5C687AE5] opacity-90"></div>
                    <div class="relative px-2 sm:px-4 xl:px-11 py-2 sm:py-4 xl:py-8">
                        <h4 class="font-bold uppercase text-white text-sm sm:text-lg xl:text-3xl">
                            for developers
                        </h4>
                        <p class="mt-2 xl:mt-4 text-xs sm:text-base lg:text-xl">
                            “Visibility & Quality Mark That Matters.” We connect you with your buyers.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @if ($hotels)
            <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m mt-10" uk-grid>
                @foreach($hotels as $hotel)
                    <div>
                        <div
                            class="relative flex flex-col justify-between border-rounded p-3 h-[300px]"
                            style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_old ?? asset('assets/images/object-background.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"
                        >
                            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                            <!-- Image Top -->
                            <div class="flex justify-between items-center z-10">
                                @if ($hotel->tags)
                                    <div class="flex items-center space-x-2">
                                        @foreach($hotel->tags->take(2) as $tag)
                                            <div class="card-tag-button bg-[#5A6BC9bb]">
                                                {{ $tag->name }}
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
                                    <button>
                                        <img
                                            src="{{ asset('assets/images/icons/heart.svg') }}"
                                            alt="heart"
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
                @endforeach
            </div>
        @endif
    </div>
</section>
