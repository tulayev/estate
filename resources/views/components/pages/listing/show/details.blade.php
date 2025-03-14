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
                <div
                    class="relative bg-cover bg-center bg-no-repeat border-rounded px-4 pt-4 pb-4 md:px-8 md:pt-8 md:pb-10"
                    style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}');"
                >
                    <div class="absolute border-rounded inset-0 bg-gradient-to-t from-black to-transparent"></div>
                    <!-- Image Top -->
                    <div class="relative flex flex-col space-y-2 sm:space-y-0 sm:flex-row justify-between items-center">
                        @if ($hotel->tags)
                            <div class="flex items-center space-x-2">
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
                        <div>
                            <a
                                href="#contactSection"
                                class="main-button"
                            >
                                request online tour
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
                            ฿{{ $hotel->formatted_price }} 
                        </p>
                    </div>
                </div>
            </div>
            <!-- Gallery -->
            <div uk-slider="autoplay: true">
                <div
                    class="uk-position-relative uk-visible-toggle uk-light mt-4 md:mt-6"
                    tabindex="-1"
                >
                    <div
                        class="uk-grid-small uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-4@m"
                        uk-lightbox="animation: fade"
                    >
                        @if ($hotel->gallery)
                            @foreach($hotel->gallery as $image)
                                <div>
                                    <a href="{{ ImagePathResolver::resolve($image) }}">
                                        <img
                                            src="{{ ImagePathResolver::resolve($image) }}"
                                            alt="{{ $hotel->title }}"
                                            class="border-rounded object-cover w-full h-64"
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
                                            class="border-rounded object-cover w-full h-64"
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
                <!-- Uikit slider dot navigation -->
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
            </div>

            <!-- Description -->
            <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10 rounded-[28px] shadow-card bg-white px-3 py-5">
                <div class="collapse-title text-[1rem] items-center uppercase border-b border-borderColor p-4">
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
                            <p
                                class="w font-normal normal-case"
                                x-show="expanded"
                                x-cloak
                            >
                                {!! $hotel->description !!}
                            </p>
                            <p
                                class="collapse-title-object-description font-normal normal-case"
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
                    @else
                        {!! $hotel->description !!}
                    @endif
                </div>
            </div>
            <!-- Features -->
            @if ($hotel->features)
                <div class="mt-2 md:mt-4 lg:mt-6 xl:mt-8" x-data="{ showAll: false }">
                    <div class="uk-child-width-1-2 uk-child-width-1-3@m uk-grid-small" uk-grid>
                        @foreach($hotel->features as $index => $feature)
                            <div x-show="showAll || {{ $index }} < 3">
                                <a
                                    href="{{ route('pages.listing.index', ['feature' => $feature->id]) }}"
                                    class="collapse-title text-sm shadow-card rounded-[28px] flex justify-center items-center bg-white py-3 sm:py-6 px-4 hover:text-secondary"
                                >
                                    {{ $feature->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if($hotel->features->count() > 3)
                        <div class="text-center mt-4">
                            <button
                                type="button"
                                class="modal-subtitle"
                                @click="showAll = !showAll"
                            >
                                <span x-text="showAll ? 'Show less' : 'Show more'"></span>
                            </button>
                        </div>
                    @endif
                </div>
            @endif
        @endif
    </div>
</section>
