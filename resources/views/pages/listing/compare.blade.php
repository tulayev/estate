<x-layout.app>
    <main
        class="uk-visible@s main-section relative mt-2 sm:mt-14 md:mt-28 xl:mt-40 xxl:mt-48"
        x-data="searchVisibility"
    >
        <div
            class="container relative"
            x-show="visible && !$store.navbar.isHovered"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <x-layout.listing.search />
        </div>
    </main>

    <x-pages.listing.compare.table :hotels="$hotels" />

</x-layout.app>
