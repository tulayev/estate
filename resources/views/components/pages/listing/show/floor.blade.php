@props([
    'hotel' => null,
])

@if ($hotel->floors)
    <section class="section">
        <div class="container">
            <h2 class="section-title">
                floor plans
            </h2>
            <!-- Floors -->
            <div class="mt-6 md:mt-12 xl:mt-24">
                <div class="border-rounded bg-white shadow-card">
                    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: false">
                        @php($floors = $hotel->floors->sortBy('floor'))
                        @foreach($floors as $floor)
                            <li class="uk-parent px-4">
                                <a href="#">
                                    <div class="flex flex-wrap w-[90%] space-x-2 sm:space-x-4 text-primary text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">
                                        <div>
                                            <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                Floor {{ $floor->floor }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                🛏️ {{ $floor->bedrooms }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                🛁 {{ $floor->bathrooms }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="shadow-card border-rounded p-2 sm:px-4 sm:py-2">
                                                📐 {{ $floor->area }} m<sup>2</sup>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <ul class="uk-nav-sub">
                                    <li>
                                        <img
                                            src="{{ ImagePathResolver::resolve($floor->image) ?? asset('assets/images/floor-placeholder.png') }}"
                                            alt="Floor {{ $floor->floor }}"
                                        />
                                    </li>
                                </ul>
                            </li>
                            <li class="uk-nav-divider"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
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
@endif
