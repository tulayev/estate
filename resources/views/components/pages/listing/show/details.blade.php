@props([
    'hotel' => null
])

<section class="pt-6 sm:pt-8 md:pt-12 lg:pt-16 xl:pt-20">
    <div class="container">
        @if ($hotel)
            <h2 class="modal-subtitle">off plan | {{ $hotel->title }}</h2>
            <!-- Main -->
            <div class="mt-4 md:mt-6 lg:mt-8 xl:mt-10">
                <div
                    class="relative bg-cover bg-center bg-no-repeat border-rounded p-4 md:p-8 xl:p-10 bg-gradient-50"
                    style="background-image: url('{{ ImagePathResolver::resolve($hotel->main_image) ?? $hotel->main_image_url ?? asset('assets/images/object-background.png') }}');"
                >
                    <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                    <!-- Image Top -->
                    <div class="relative flex flex-col space-y-2 sm:space-y-0 sm:flex-row justify-between items-center">
                        @if ($hotel->tags)
                            <div class="flex items-center space-x-2">
                                @foreach($hotel->tags->take(3) as $tag)
                                    <div class="card-tag-button random-bg-color">
                                        {{ $tag->name }}
                                    </div>
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
                            ${{ $hotel->price }}
                        </p>
                    </div>
                </div>
            </div>
            <!-- Gallery -->
            <div class="mt-4 md:mt-6 uk-grid-small uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@l" uk-grid>
                @if ($hotel->gallery)
                    @foreach($hotel->gallery as $image)
                        <div>
                            <img
                                src="{{ ImagePathResolver::resolve($image) }}"
                                alt="{{ $hotel->title }}"
                                class="border-rounded"
                            />
                        </div>
                    @endforeach
                @elseif ($hotel->gallery_url)
                    @foreach(Helper::splitString($hotel->gallery_url, ';') as $image)
                        <div>
                            <img
                                src="{{ $image }}"
                                alt="{{ $hotel->title }}"
                                class="border-rounded"
                            />
                        </div>
                    @endforeach
                @endif
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
                                <div class="shadow-card rounded-[28px] flex justify-center items-center bg-white py-3 sm:py-6">
                                    <span class="collapse-title">
                                        {{ $feature->name }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    </div>
</section>
