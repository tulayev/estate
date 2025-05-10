<x-layout.app>

    <main class="uk-visible@s main-section relative mt-2 sm:mt-14 md:mt-28 xl:mt-40 xxl:mt-48">
        <x-layout.listing.search />
    </main>

    <x-pages.listing.show.details
        :hotel="$hotel"
    />

    <x-pages.listing.show.history />

    <x-pages.listing.show.floor
        :hotel="$hotel"
    />

    <x-pages.listing.show.similar-listing
        :similarHotels="$similarHotels"
    />

</x-layout.app>
