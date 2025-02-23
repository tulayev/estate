@props([
    'hotel' => null
])

<section class="pt-6 sm:pt-8 md:pt-12 lg:pt-16 xl:pt-20">
    <div class="container">
        @if ($hotel)
            <h2 class="modal-subtitle">
                @if ($hotel->types && $hotel->types->first())
                    <a
                        href="{{ route('pages.listing.index', ['type' => $hotel->types->first()->id]) }}"
                        class="hover:text-secondary"
                    >
                        {{ $hotel->types->first()->name }}
                    </a>
                @endif
                | {{ $hotel->title }}
            </h2>
            <!-- Main -->
            <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10">
                <div
                    class="relative bg-cover bg-center bg-no-repeat border-rounded p-4 md:p-8 xl:p-10"
                    style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}');"
                >
                    <div class="absolute border-rounded inset-0  from-black opacity-50 bg-gradient-to-b"></div>
                    <!-- Image Top -->
                    <div class="relative flex flex-col space-y-2 sm:space-y-0 sm:flex-row justify-between items-center">
                        @if ($hotel->tags)
                            <div class="flex items-center space-x-2">
                                @foreach($hotel->tags->take(3) as $tag)
                                    <a
                                        href="{{ route('pages.listing.index', ['tag' => $tag->id]) }}"
                                        class="card-tag-button random-bg-color hover:text-primary"
                                    >
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        <div>
                            <a
                                onclick="document.getElementById('contactSection').scrollIntoView({behavior: 'smooth'})"
                                class="main-button"
                            >
                                <span>request online tour</span>
                            </a>
                        </div>
                    </div>
                    <!-- Image Bottom -->
                    <div class="relative text-white uppercase mt-20 sm:mt-40 md:mt-64 lg:mt-80 xl:mt-96">
                        <div class="flex items-center space-x-2 sm:space-x-3">
                            @if ($hotel->ie_verified)
                                <img
                                    class="w-10"
                                    src="{{ asset('assets/images/icons/verified.svg') }}"
                                    alt="verified"
                                />
                            @endif
                            <h3 class="section-title-white">
                                {{ $hotel->title }}
                            </h3>
                        </div>
                        <p class="text-sm sm:text-base md:text-lg font-bold xl:font-black mt-2 sm:mt-4 ml-12">
                            ${{ number_format($hotel->price, 2, '.', ',') }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- Gallery -->
            <div id="default-carousel" class="mt-2 relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-40 overflow-hidden rounded-[25px] md:h-72">
                    @if ($hotel->gallery)
                        @foreach($hotel->gallery as $index => $image)
                            <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ ImagePathResolver::resolve($image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $hotel->title }}">
                            </div>
                        @endforeach
                    @elseif ($hotel->gallery_url)
                        @foreach(Helper::splitString($hotel->gallery_url, ';') as $index => $image)
                            <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ $image }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="{{ $hotel->title }}">
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            

            
            <!-- Description -->
            <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10 rounded-[28px] shadow-card bg-white px-3 py-5">
                <div class="text-primary text-center items-center uppercase border-b border-borderColor text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black px-4 pb-4 md:pb-8">
                    <div class="uk-child-width-1-2 uk-child-width-1-4@s uk-grid-small" uk-grid>
                        @if ($hotel->types)
                            <div>
                                <p>
                                    🏠 {{ implode(', ', $hotel->types->pluck('name')->toArray()) }}
                                </p>
                            </div>
                        @endif
                        <div>
                            <p>
                                📐 {{ $hotel->area }} M<sup>2</sup>
                            </p>
                        </div>

                        <div>
                            <p>
                                🛏️ {{ $hotel->bedrooms }} bedrooms
                            </p>
                        </div>
                        <div>
                            <p>
                                🏷️ {{ $hotel->codename ?? 'IE-ITR-197' }}
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="mt-4 md:mt-6 lg:mt-8 xl:mt-10 px-4"
                    x-data="{ expanded: false }"
                >
                    <p
                        class="collapse-title font-normal normal-case"
                        x-show="expanded"
                        x-cloak
                    >
                        {!! $hotel->description !!}
                    </p>
                    <p
                        class="collapse-title font-normal normal-case"
                        x-show="!expanded"
                        x-cloak
                    >
                        {!! Str::limit(strip_tags($hotel->description), 350) !!}
                    </p>
                    <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10 text-center">
                        <button
                            type="button"
                            class="modal-subtitle"
                            @click="expanded = !expanded"
                        >
                            <span x-text="expanded ? 'See less' : 'See more'"></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Features -->
            @if ($hotel->features)
                <div class="mt-2 md:mt-4 lg:mt-6 xl:mt-8">
                    <div class="uk-child-width-1-2 uk-child-width-1-3@m uk-grid-small" uk-grid>
                        @foreach($hotel->features as $feature)
                            <div>
                                <a
                                    href="{{ route('pages.listing.index', ['feature' => $feature->id]) }}"
                                    class="shadow-card text-sm rounded-[28px] flex justify-center items-center bg-white py-3 sm:py-6 px-4 collapse-title hover:text-secondary"
                                >
                                    {{ $feature->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
</section>

<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
