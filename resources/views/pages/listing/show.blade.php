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

    <x-pages.listing.show.details :hotel="$hotel" />

    <x-pages.listing.show.history :hotel="$hotel" />

    <x-pages.listing.show.floor :hotel="$hotel" />

    <x-pages.listing.show.similar-listing
        :similarHotels="$similarHotels"
        :hotel="$hotel"
    />


    <script defer>
        document.addEventListener('alpine:init', () => {
            Alpine.store('navbar', {
                isHovered: false
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const navbar = document.querySelector('.navbar');

            if (navbar) {
                navbar.addEventListener('mouseenter', () => {
                    Alpine.store('navbar').isHovered = true;
                });

                navbar.addEventListener('mouseleave', () => {
                    Alpine.store('navbar').isHovered = false;
                });
            }
        });
    </script>

    <script defer>
        document.addEventListener('alpine:init', () => {
            Alpine.data('searchVisibility', () => ({
                visible: true,
                lastScrollTop: 0,

                init() {
                    this.initScrollListener();
                },

                initScrollListener() {
                    window.addEventListener('scroll', () => {
                        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                        this.handleScroll(scrollTop);
                    });
                },

                handleScroll(scrollTop) {
                    if (scrollTop === 0) {
                        this.show();
                    } else if (scrollTop > this.lastScrollTop) {
                        this.hide();
                    }
                    this.lastScrollTop = Math.max(0, scrollTop);
                },

                show() {
                    this.visible = true;
                },

                hide() {
                    this.visible = false;
                }
            }));
        });
    </script>
</x-layout.app>
