<x-layout.app>

    <x-pages.listing.index.main />

    <x-pages.listing.index.list
        :hotels="$hotels"
        :viewType="$viewType"
    />

    <x-layout.newsletter />

</x-layout.app>
