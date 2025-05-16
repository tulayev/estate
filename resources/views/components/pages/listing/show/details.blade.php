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
                @else
                    <a
                        href="{{ route('pages.listing.index') }}"
                        class="hover:text-secondary"
                    >
                        {{__('listing/index/main.title')}}
                    </a>
                @endif
                | {{ $hotel->title }}
            </h2>
            <!-- Main -->
            <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10">
                <div class="relative px-4 pt-4 pb-4 md:px-8 md:pt-8 md:pb-10">
                    <div class="absolute inset-0 pointer-events-none">
                        <img
                            data-src="{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}"
                            class="lazy-image cursor-pointer pointer-events-auto"
                            alt="{{ $hotel->title }}"
                            loading="lazy"
                            onclick="document.querySelector('.uk-slider-items a')?.click()"
                        />
                    </div>
                    <div class="absolute border-rounded inset-0 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                    <!-- Image Top -->
                    <div class="relative flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-2 sm:space-y-0 pointer-events-auto">
                        @if ($hotel->tags)
                            <div class="flex items-center space-x-2" onclick="event.stopPropagation()">
                                @foreach($hotel->tags->take(3) as $index => $tag)
                                    <a
                                        href="{{ route('pages.listing.index', ['tag' => $tag->id]) }}"
                                        class="card-tag-button bg-color-{{ $index + 1 }} bg-opacity-60 hover:text-primary"
                                    >
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        <div onclick="event.stopPropagation()">
                            <a
                                href="#contactSection"
                                class="card-tag-button bg-color-2 bg-opacity-60 hover:text-primary"
                            >
                                request online tour
                            </a>
                        </div>
                    </div>
                    <!-- Image Bottom -->
                    <div class="relative text-white uppercase mt-20 sm:mt-40 md:mt-64 lg:mt-80 xl:mt-96 pointer-events-auto" onclick="event.stopPropagation()">
                        <div class="flex items-start space-x-2 sm:space-x-3">
                            @if ($hotel->ie_verified)
                                <img
                                    class="w-5 sm:w-8 md:w-10"
                                    src="{{ asset('assets/images/icons/verified.svg') }}"
                                    alt="verified"
                                />
                            @endif
                            <div>
                                <h3 class="text-white text-sm sm:text-lg md:text-2xl xl:text-3xl font-bold xl:font-black">
                                    {{ $hotel->title }}
                                </h3>
                                <p class="text-sm sm:text-base md:text-lg font-bold xl:font-black mt-2 sm:mt-4">
                                    @php($converted = Helper::getCurrencyConvertedValue($hotel->price))
                                    {{ $converted['symbol'] . ' ' . $converted['value'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Gallery -->
            <div class="hidden md:block" uk-slider="autoplay: true">
                <div
                    class="uk-position-relative uk-visible-toggle uk-light mt-4 md:mt-6"
                    tabindex="-1"
                >
                    <div
                        class="objectSlider uk-grid uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m"
                        uk-lightbox="animation: fade"
                    >
                        @if ($hotel->gallery)
                            @foreach($hotel->gallery as $image)
                                <div>
                                    <a href="{{ ImagePathResolver::resolve($image) }}">
                                        <img
                                            src="{{ ImagePathResolver::resolve($image) }}"
                                            alt="{{ $hotel->title }}"
                                            class="border-rounded object-cover w-full h-32 md:h-64"
                                            loading="lazy"
                                        />
                                    </a>
                                </div>
                            @endforeach
                        @elseif ($hotel->gallery_url)
                            @foreach(Helper::splitString($hotel->gallery_url, ';') as $image)
                                <div>
                                    <a href="{{ $image }}">
                                        <img
                                            src="{{ $image }}"
                                            alt="{{ $hotel->title }}"
                                            class="border-rounded object-cover w-full h-32 md:h-64"
                                            loading="lazy"
                                        />
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Uikit slider prev/next buttons -->
                    <a
                        class="uk-position-center-left uk-position-small uk-hidden-hover"
                        href
                        uk-slidenav-previous
                        uk-slider-item="previous"
                    ></a>
                    <a
                        class="uk-position-center-right uk-position-small uk-hidden-hover"
                        href
                        uk-slidenav-next
                        uk-slider-item="next"
                    ></a>
                </div>
            </div>

            <!-- Description -->
            <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10 rounded-[28px] shadow-card bg-white px-3 py-5">
                <div class="collapse-title text-sm items-center uppercase border-b border-borderColor p-4">
                    <div class="uk-child-width-1-2 uk-child-width-1-4@s uk-grid-small text-center" uk-grid>
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
                                🛏️ {{ $hotel->bedrooms }} {{ __('general.filter_popup_bedrooms') }}
                            </p>
                        </div>
                        <div>
                            <p>
                                🏷️ {{ $hotel->codename ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10 px-4">
                    @if (mb_strlen($hotel->description) >= 350)
                        <div x-data="{ expanded: false }">
                            <div x-show="expanded">
                                {!! $hotel->description !!}
                            </div>
                            <div x-show="!expanded">
                                {!! Str::limit($hotel->description, 350) !!}
                            </div>
                            <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10 text-center">
                                <button
                                    type="button"
                                    class="modal-subtitle"
                                    @click="expanded = !expanded"
                                >
                                    <span x-text="expanded ? '{{ __('general.show_less') }}' : '{{ __('general.show_more') }}'"></span>
                                </button>
                            </div>
                        </div>
                    @else
                        {!! $hotel->description !!}
                    @endif
                </div>
            </div>

            <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10 px-4">
                <div class="rounded-full bg-primary opacity-90 flex items-center h-[70px]">
                    <div class="w-[15%] flex justify-center space-x-2">
                        <img
                            src="{{ asset('assets/images/icons/logo-icon-white.svg') }}"
                            alt="Logo White"
                            class="w-5"
                        />
                        <span class="collapse-title text-sm text-center text-white">
                             IE Score
                        </span>
                    </div>
                    <div class="w-[65%]">
                        <div class="w-full h-[40px] bg-white rounded-full">
                            <div class="h-[40px] bg-gradient-to-r from-primary to-[#7DA2BD] rounded-full border border-white" style="width: 45%">
                                <div class="h-full flex justify-end items-center pr-4">
                                    <span class="collapse-title text-white">
                                        45
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-[20%] collapse-title text-sm text-center text-white">
                        <a href="{{ url('/insights/about-ie-score') }}" class="underline hover:text-secondary">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>

            <!-- Features -->
            @if ($hotel->features)
                <div
                    class="mt-2 md:mt-4 lg:mt-6 xl:mt-8"
                    x-data="{ showAll: false }"
                >
                    <div class="uk-child-width-1-2 uk-child-width-1-3@m uk-grid-small" uk-grid>
                        @foreach($hotel->features as $index => $feature)
                            <div x-show="showAll || {{ $index }} < 9">
                                <a
                                    href="{{ route('pages.listing.index', ['feature' => $feature->id]) }}"
                                    class="collapse-title text-sm shadow-card rounded-[28px] flex justify-center items-center bg-white py-3 sm:py-6 px-4 hover:text-secondary"
                                >
                                    {{ $feature->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if($hotel->features->count() > 9)
                        <div class="text-center mt-4">
                            <button
                                type="button"
                                class="bg-white text-primary rounded-[100px] modal-subtitle py-5 w-full hover:text-white hover:bg-primary"
                                @click="showAll = !showAll"
                            >
                                <span x-text="showAll ? '{{ __('general.show_less') }}' : '{{ __('general.show_more') }}'"></span>
                            </button>
                        </div>
                    @endif
                </div>
            @endif

            <!-- Visual cue for mobile: floating button, appears when main image is in viewport -->
            <div x-data="{
                show: false,
                observer: null,
                init() {
                    const target = this.$el.parentElement.querySelector('img.lazy-image');
                    this.observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            this.show = entry.isIntersecting;
                        });
                    }, { threshold: 0.5 });
                    if (target) this.observer.observe(target);
                },
                openGallery() {
                    document.querySelector('.uk-slider-items a')?.click();
                }
            }" x-init="init()" class="md:hidden">
                <button
                    x-show="show"
                    @click="openGallery"
                    class="fixed left-1/2 bottom-8 z-50 -translate-x-1/2 bg-primary text-white font-bold rounded-full shadow-lg flex items-center px-6 py-3 text-base transition-opacity duration-300"
                    style="opacity: 0.95;"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A2 2 0 0122 9.618V17a2 2 0 01-2 2H4a2 2 0 01-2-2V7a2 2 0 012-2h7.382a2 2 0 011.447.618L15 10zm0 0V6a2 2 0 012-2h2a2 2 0 012 2v4" /></svg>
                    {{ __('View Gallery') }}
                </button>
            </div>
        @endif
    </div>
</section>
