<!-- Search Form -->
<form
    id="searchForm"
    class="uk-visible@s text-secondary z-10 bg-white font-semibold uppercase rounded-full absolute left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 sm:flex items-center px-3 w-[90vw] lg:w-[70vw] h-[50px] xl:h-[70px] text-sm xl:text-xl"
    autocomplete="off"
>
    <div>
        <img
            src="{{ asset('assets/images/icons/circle.png') }}"
            alt="circle"
            class="w-10"
        />
    </div>

    <x-ui.search.keywords-input />

    <x-ui.search.type-input :types="$types" />

    <x-ui.search.location-input />

    <x-ui.search.beds-input />

    <x-ui.search.price-input />

    <div class="h-full flex items-center justify-end w-[12%] md:w-[10%] space-x-5">
        <button
            class="text-3xl bg-transparent border-none outline-none"
            type="button"
            uk-toggle="target: #searchModal"
        >
            +
        </button>
        <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px]">
            <button
                class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px] bg-primary rounded-full flex items-center justify-center"
                type="submit"
            >
                <img
                    class="w-[14px] xl:w-[20px]"
                    src="{{ asset('assets/images/icons/search.svg') }}"
                    alt="search"
                />
            </button>
        </div>
    </div>
</form>

<!-- Filter Modal -->
<div
    id="searchModal"
    class="w-[85%] h-[90%] m-auto bg-white rounded-[31px]"
    uk-modal
>
    <form
        id="filterForm"
        action="{{ route('pages.listing.index') }}"
        class="p-4 sm:p-6 lg:p-8 xl:px-11 xl:py-9"
    >
        <div class="flex justify-between items-center">
            <h2 class="section-title">
                filters
            </h2>

            <div>
                <button>
                    <img
                        class="uk-modal-close"
                        src="{{ asset('assets/images/icons/modal-close.svg') }}"
                        alt="close"
                    />
                </button>
            </div>
        </div>

        <!-- Type -->
        @if ($types)
            <x-ui.filter.types :types="$types" />
        @endif

        <!-- Keywords & Price range -->
        <div class="uk-child-width-1-2 md:pt-10 xl:pt-20" uk-grid>
            <!-- Keywords -->
            <x-ui.filter.keywords />
            <!-- Price Range -->
            <x-ui.filter.ranges.price-range
                :fromInputName="'price_min'"
                :toInputName="'price_max'"
                :minLength="3"
                :maxLength="7"
                :step="1000"
                :minValue="1"
                :maxValue="1000000"
            />
        </div>

        <!-- Map -->
        @if ($locations)
            <x-ui.filter.map :locations="$locations" />
        @endif
        <!-- Features -->
        @if ($features)
            <x-ui.filter.features :features="$features" />
        @endif
        <!-- Tags -->
        @if ($tags)
            <x-ui.filter.tags :tags="$tags" />
        @endif

        <!-- Show Results button -->
        <div
            x-data="filtersHandler()"
            class="mt-4 sm:mt-6 md:mt-8 lg:mt-12 xl:mt-24"
        >
            <button
                id="showResultsButton"
                type="submit"
                class="w-full bg-primary border-rounded modal-subtitle text-white text-center py-2 sm:py-4 xl:py-7"
                x-text="buttonText"
            ></button>
        </div>
    </form>
</div>

<script>
    const filtersHandler = () => ({
        API_URI: '/api/hotels/count',
        buttonText: 'Loading...',
        filters: {},

        async fetchResultsCount() {
            try {
                const response = await fetch(this.API_URI, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify(this.filters),
                });

                const data = await response.json();
                this.buttonText = `Show ${data.count === 0 ? '' : data.count} Results`;
            } catch (error) {
                console.error('Error updating results count:', error);
                this.buttonText = 'Error loading results';
            }
        },

        updateFilters(event) {
            const formData = new FormData(event.target.form);
            this.filters = Object.fromEntries(formData.entries());
            this.fetchResultsCount();
        },

        init() {
            // Initialize the filters and fetch results count
            this.filters = Object.fromEntries(new FormData(document.getElementById('filterForm')).entries());
            this.fetchResultsCount();

            // Add event listeners to filter inputs
            document.querySelectorAll('#filterForm input, #filterForm select').forEach(input => {
                input.addEventListener('change', event => this.updateFilters(event));
            });
        }
    });
</script>
