@props([
    'hotels' => null,
    'viewType' => '',
])

<section class="section">
    <div class="container">
        <div class="w-full flex justify-between">
            <h2 class="section-title">{{ __('listing/index/list.for_sale_off_plan') }}</h2>
            @if (request()->has('sort'))
                <span class="normal-case ml-4 font-semibold">
                    @switch(request()->get('sort'))
                        @case('title_asc')
                            {{ __('listing/index/list.title_ascending') }}
                            @break
                        @case('title_desc')
                            {{ __('listing/index/list.title_descending') }}
                            @break
                        @case('price_asc')
                            {{ __('listing/index/list.price_low_to_high') }}
                            @break
                        @case('price_desc')
                            {{ __('listing/index/list.price_high_to_low') }}
                            @break
                    @endswitch
                </span>
            @endif
            <x-ui.switcher-panel.toggle-view />
        </div>

        @if ($hotels->isNotEmpty())
            <!-- Grid View or List View -->
            <div class="mt-4 md:mt-6 xl:mt-12">
                @switch($viewType)
                    @case('list')
                        <div id="hotelsWrapper" class="uk-child-width-1-1" uk-grid>
                            <x-pages.listing.index.view-type.list
                                :hotels="$hotels"
                                :viewType="$viewType"
                            />
                        </div>
                    @break
                    @default
                        <div id="hotelsWrapper" class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@l" uk-grid>
                            <x-pages.listing.index.view-type.list
                                :hotels="$hotels"
                                :viewType="$viewType"
                            />
                        </div>
                    @break
                @endswitch

                @if ($hotels->hasMorePages())
                    <div
                        class="w-full flex justify-center mt-4 md:mt-6 xl:mt-10"
                        x-data="hotelPagination()"
                        x-init="initializeCardsSlider()"
                    >
                        <button
                            id="seeMore"
                            x-show="hasMorePages"
                            @click="loadMore"
                            class="bg-white text-primary rounded-[100px] modal-subtitle py-5 w-full hover:text-white hover:bg-primary"
                        >
                            {{ __('general.see_more') }}
                        </button>
                    </div>
                @endif
            </div>
        @else
            <x-ui.nothing-found
                :title="__('general.nothing_found')"
                :message="__('general.search_try_again')"
                :showSearchTips="true"
                :backUrl="route('pages.listing.index')"
                data-clean-url="{{ request()->url() }}"
            />
        @endif
    </div>
</section>

<script defer>
    function hotelPagination() {
        return {
            currentPage: 1,
            hasMorePages: {{ $hotels->hasMorePages() ? 'true' : 'false' }},
            lastPage: {{ $hotels->lastPage() }},
            swiperInstances: [],

            async loadMore() {
                if (!this.hasMorePages)
                    return;

                this.currentPage++;

                try {
                    const existingParams = new URLSearchParams(window.location.search);
                    const queryParams = new URLSearchParams(existingParams);

                    queryParams.set('page', this.currentPage);

                    const response = await fetch(`?${queryParams.toString()}`, {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const html = await response.text();
                    const hotelsWrapper = document.getElementById('hotelsWrapper');
                    hotelsWrapper.insertAdjacentHTML('beforeend', html);

                    this.lazyLoadImages();
                    this.initializeCardsSlider();

                    if (this.currentPage >= this.lastPage) {
                        this.hasMorePages = false;
                    }
                } catch (error) {
                    console.error("Error loading more hotels:", error);
                }
            },

            lazyLoadImages() {
                const lazyImages = document.querySelectorAll('.lazy-image');

                const lazyLoad = (entry) => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.getAttribute('data-src');
                        img.onload = () => {
                            img.classList.add('loaded');
                        };
                        observer.unobserve(img);
                    }
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(lazyLoad);
                });

                lazyImages.forEach((img) => observer.observe(img));
            },

            initializeCardsSlider() {
                this.swiperInstances.forEach(swiper => swiper.destroy(true, true));
                this.swiperInstances = [];

                document.querySelectorAll('.listing-slider').forEach(slider => {
                    const swiper = new Swiper(slider, {
                        loop: true,
                        slidesPerView: 1,
                        spaceBetween: 0,
                        autoplay: false,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                    });

                    this.swiperInstances.push(swiper);
                });
            },
        };
    }
</script>
