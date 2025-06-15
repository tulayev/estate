<x-layout.app>
    <main class="uk-visible@s main-section relative mt-2 sm:mt-14 md:mt-28 xl:mt-40 xxl:mt-48">
        <div class="container relative">
            <x-layout.listing.search />
        </div>
    </main>

    <x-pages.listing.compare.table :hotels="$hotels" />

</x-layout.app>
