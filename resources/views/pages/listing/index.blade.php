<x-layout.app>

    <x-pages.listing.index.main
        :latestHotels="$latestHotels"
    />

    <x-pages.listing.index.list
        :hotels="$hotels"
        :viewType="$viewType"
    />

    <x-layout.newsletter />

    <x-ui.links.compare-objects-link />

</x-layout.app>
