<x-layout.app>

    <x-pages.home.main />

    <x-pages.home.problem />

    <x-pages.home.media />

    <x-pages.home.verified
        :hotels="$hotels"
        :likedHotels="$likedHotels"
    />

    <x-pages.home.value />

    <x-pages.home.client />

    <x-pages.home.discuss />

    <x-pages.home.faq />

</x-layout.app>
