@props([
    'similarHotels' => null,
])

<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            {{ __('listing/show/similar.title') }}
        </h2>
        <button class="primary-button">
            {{ __('listing/show/similar.button') }}
        </button>
    </div>

    <div class="swiper card-slider p-2 mt-6 md:mt-12 xl:mt-24">
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
