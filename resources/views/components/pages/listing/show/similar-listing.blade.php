@props([
    'similarHotels' => null,
])

<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            similar listings
        </h2>
        <button class="primary-button">
            subscribe to similar listings
        </button>
    </div>

    <div class="mt-6 md:mt-12 xl:mt-24 swiper">
        <div class="swiper-wrapper">
            @foreach($similarHotels as $hotel)
                <div class="swiper-slide">
                    <x-pages.listing.show.similar-listing-view.card
                        :hotel="$hotel"
                    />
                </div>
            @endforeach
        </div>
    </div>
</section>
