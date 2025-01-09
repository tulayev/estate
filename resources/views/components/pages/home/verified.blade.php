@props([
    'hotels' => null,
])

<section class="uk-section">
    <div class="mini-container">
        <h2 class="section-title mb-10 xl:mb-20 flex items-center space-x-3">
            <img
                class="w-[30px] sm:w-[50px]"
                src="{{ asset('assets/images/icons/verified.svg') }}"
                alt="verified"
            />
            <span>ie verified</span>
        </h2>
    </div>
    <div class="mini-container pb-10 sm:pb-24">
        <div class="grid md:grid-cols-2 gap-5 md:gap-10 mt-10">
            <div class="card-mini relative text-white">
                <div class="absolute inset-0 bg-[#0F1F3DE5] opacity-90"></div>
                <img
                    class="w-full h-full object-cover"
                    src="{{ asset('assets/images/verified_1.png') }}"
                    alt="primary"
                />
                <div class="content-wrapper">
                    <h4 class="text-lg xl:text-3xl font-bold uppercase text-white">for investors</h4>
                    <p class="text-[12px] sm:text-base lg:text-xl">
                        “Data & Quality Mark You Can Trust.” We do the research. You get the facts, clarity & best terms.
                    </p>
                </div>
            </div>
            <div class="card-mini relative text-white">
                <div class="absolute inset-0 bg-[#5C687AE5] opacity-90"></div>
                <img
                    class="w-full h-full object-cover"
                    src="{{ asset('assets/images/verified_2.png') }}"
                    alt="primary"
                />
                <div class="content-wrapper">
                    <h4 class="text-lg xl:text-3xl font-bold uppercase text-white">for investors</h4>
                    <p class="text-[12px] sm:text-base lg:text-xl">
                        “Data & Quality Mark You Can Trust.” We do the research. You get the facts, clarity & best terms.
                    </p>
                </div>
            </div>

        </div>

        @if ($hotels)
            <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m mt-10" uk-grid>
                @foreach($hotels as $hotel)
                    <div>
                        <div
                            class="relative flex flex-col justify-between rounded-[25px] p-3 h-[300px]"
                            style="background-image: url('{{ ImagePathResolver::resolve($hotel->image) ?? asset('assets/images/object-background.png') }}')"
                        >
                            <div class="absolute rounded-[25px] inset-0 bg-gradient-to-b from-black/50 to-black/0"></div>
                            <!-- Image Top -->
                            <div class="flex justify-between items-center z-10">
                                @if ($hotel->tags)
                                    <div class="flex items-center space-x-2">
                                        @foreach($hotel->tags->take(2) as $tag)
                                            <div class="mini-btn bg-[#5A6BC9bb]">
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
                                <div class="text-lg flex justify-between items-center uppercase">
                                    <div class="flex items-center space-x-2">
                                        <img
                                            width="24"
                                            src="{{ asset('assets/images/icons/verified.svg') }}"
                                            alt="verified"
                                        />
                                        <p class="text-white font-bold">
                                            {{ $hotel->title }}
                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-white font-bold">${{ $hotel->price }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Bottom -->
                        <div class="shadow-feature-card rounded-[25px] mt-[-44px] px-5 pt-[68px] pb-6">
                            <div class="flex justify-between uppercase text-[#505050] text-xl font-900">
                                <div>
                                    <p>📍 bang tao</p>
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
