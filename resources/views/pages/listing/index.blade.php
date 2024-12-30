<x-layout.app>

    <x-pages.listing.main />

    <x-layout.search />

    <x-pages.listing.objects.index
        :hotels="$hotels"
    />

    <x-pages.listing.filter
        :hotels="$hotels"
        :tags="$tags"
        :features="$features"
    />

</x-layout.app>
