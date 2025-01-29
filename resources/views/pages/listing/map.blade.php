<x-layout.listing-layout>

    <main class="main-section relative mt-2 sm:mt-40">
        <x-layout.listing.search />
    </main>

    <x-pages.listing.index.map
        :hotels="$hotels"
    />

</x-layout.listing-layout>
