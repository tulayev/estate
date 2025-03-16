@props([
    'hotel' => null,
])

<section class="section">
    <div class="container">
        @php
            $validFloors = $hotel->floors->filter(function($floor) {
                return !($floor->floor === 'N/A'
                && $floor->image === null
                && $floor->image_url === null
                && $floor->bedrooms == 0
                && $floor->bathrooms == 0
                && $floor->price == 0.000);
            });
        @endphp

        @if ($validFloors->isNotEmpty())
            <h2 class="section-title">
                {{ __('listing/show/floor.title') }}
            </h2>
            <!-- Floors -->
            <div class="mt-6 md:mt-12 xl:mt-24">
                <div class="border-rounded bg-white shadow-card">
                    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: false">
                        @foreach($validFloors->sortBy('floor') as $floor)
                            <li class="uk-parent px-4">
                                <a href="#">
                                    <div class="flex flex-wrap w-[90%] space-x-2 sm:space-x-4 text-primary text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">
                                        @if ($floor->floor !== 'N/A')
                                            <div>
                                                <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                    {{ $floor->floor }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($floor->bedrooms > 0)
                                            <div>
                                                <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                    🛏️ {{ $floor->bedrooms }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($floor->bathrooms > 0)
                                            <div>
                                                <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                    🛁 {{ $floor->bathrooms }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($floor->area > 0)
                                            <div>
                                                <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                    📐 {{ $floor->area }} m<sup>2</sup>
                                                </p>
                                            </div>
                                        @endif
                                        @if ($floor->price > 0)
                                            <div>
                                                <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                   ฿ {{ $floor->price }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($floor->postfix !== 'N/A')
                                            <div>
                                                <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                    {{ $floor->postfix }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                                <ul class="uk-nav-sub">
                                    <li>
                                        <img
                                            src="{{ ImagePathResolver::resolve($floor->image) ?? $floor->image_url ?? asset('assets/images/floor-placeholder.png') }}"
                                            alt="{{ $floor->floor }}"
                                            loading="lazy"
                                        />
                                    </li>
                                </ul>
                            </li>
                            <li class="uk-nav-divider"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <!-- Map -->
        <div class="mt-6 md:mt-12 xl:mt-24">
            <div class="h-[375px] sm:h-[400px] md:h-[500px] xl:h-[650px]">
                <iframe
                    src="https://www.google.com/maps?q={{ $hotel->latitude }},{{ $hotel->longitude }}&hl=es;z=14&output=embed"
                    width="100%"
                    height="100%"
                    class="border-none border-rounded"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </div>
</section>
