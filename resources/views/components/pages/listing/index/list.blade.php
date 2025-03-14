@props([
    'hotels' => null,
    'viewType' => '',
])

<section class="section">
    <div class="container">
        <div class="w-full flex justify-between">
            <div class="collapse-title">
                {{ __('listing/index/list.for_sale_off_plan') }}
                @if (request()->has('sort'))
                    <span class="normal-case ml-4 font-normal">
                        @switch(request()->get('sort'))
                            @case('title_asc')
                                Title Ascending
                                @break
                            @case('title_desc')
                                Title Descending
                                @break
                            @case('price_asc')
                                Price Low to High
                                @break
                            @case('price_desc')
                                Price High to Low
                                @break
                        @endswitch
                    </span>
                @endif
            </div>

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
                        <div id="hotelsWrapper" class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
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
            <h2 class="section-title mt-4 md:mt-10">{{ __('general.nothing_found') }}</h2>
        @endif
    </div>
</section>

<script defer>
    function hotelPagination() {
        return {
            currentPage: 1,
            hasMorePages: {{ $hotels->hasMorePages() ? 'true' : 'false' }},
            lastPage: {{ $hotels->lastPage() }},

            async loadMore() {
                if (!this.hasMorePages)
                    return;

                this.currentPage++;

                try {
                    const existingParams = new URLSearchParams(window.location.search);
                    const queryParams = new URLSearchParams(existingParams);

                    queryParams.set('page', this.currentPage);

                    const response = await axios.get(`?${queryParams.toString()}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    const hotelsWrapper = document.getElementById('hotelsWrapper');
                    hotelsWrapper.insertAdjacentHTML('beforeend', response.data);

                    // Reapply random background colors to newly added elements
                    document.querySelectorAll('.random-bg-color').forEach((element) => {
                        if (!element.dataset.bgAssigned) {
                            element.classList.add(window.getRandomColor());
                            element.dataset.bgAssigned = "true"; // Prevent reassigning
                        }
                    });

                    if (this.currentPage >= this.lastPage) {
                        this.hasMorePages = false;
                    }
                } catch (error) {
                    console.error("Error loading more hotels:", error);
                }
            }
        };
    }
</script>
