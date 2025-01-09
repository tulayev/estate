@props([
    'hotels' => null,
])

<section class="uk-section">
    <div class="mini-container">
        <h2 class="section-title mb-10 xl:mb-20 flex items-center space-x-3">
            <img class="w-[30px] sm:w-[50px]" src="{{ asset('assets/images/star.svg') }}" alt="star">
            <span>ie verified</span>
        </h2>
    </div>
    <div class="mini-container pb-10 sm:pb-24">
        <div class="grid md:grid-cols-2 gap-5 md:gap-10 mt-10">
            <div class="card-mini text-white">
                <img
                    class="w-full h-full"
                    src="https://firebasestorage.googleapis.com/v0/b/portfolio-37f86.appspot.com/o/estet%2Finvestors.png?alt=media&token=3595e014-3848-43d1-9aca-e84ee570c909"
                    alt="primary"
                />
                <div class="content-wrapper">
                    <h4 class="text-lg xl:text-3xl font-bold uppercase text-white">for investors</h4>
                    <p class="text-[12px] sm:text-base lg:text-xl">
                        “Data & Quality Mark You Can Trust.” We do the research. You get the facts, clarity & best terms.
                    </p>
                </div>
            </div>
            <div class="card-mini text-white">
                <img class="w-full h-full object-cover"
                     src="https://firebasestorage.googleapis.com/v0/b/portfolio-37f86.appspot.com/o/estet%2Fdevelopers.png?alt=media&token=76876db8-5d32-4764-bebd-38756eee13db"
                     alt="primary">
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
                        <a href="{{ route('pages.listing.show', $hotel->slug) }}">
                            <div class="card-mini h-[300px]">
                                <img
                                    class="w-full h-full"
                                    src="{{ ImagePathResolver::resolve($hotel->image) ?? asset('assets/images/object-background.png') }}"
                                    alt="{{ $hotel->title }}"
                                />
                                <div class="absolute left-0 top-0 w-full h-full  flex flex-col justify-between p-3 z-10">
                                    <div class="header flex justify-between items-center">
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
                                </div>
                                <div class="p-5 rounded-[25px] shadow-feature-card">
                                    <p>📍 bang tao                             🛏️ 1       🛁 2</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
