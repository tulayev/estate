@props([
    'hotels' => null,
    'likedHotels' => null,
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
                    class="relative bg-cover bg-no-repeat text-white rounded-lg sm:border-rounded h-full"
                    style="background-image: url('{{ asset('assets/images/verified_1.png') }}');"
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
                    class="relative bg-cover bg-no-repeat text-white rounded-lg sm:border-rounded h-full"
                    style="background-image: url('{{ asset('assets/images/verified_2.png') }}');"
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
                    <x-pages.listing.grid-view.card
                        :hotel="$hotel"
                        :likedHotels="$likedHotels"
                    />
                @endforeach
            </div>
        @endif
    </div>
</section>
