<x-layout.app>

    <main class="main-section relative mt-2 sm:mt-40">
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
