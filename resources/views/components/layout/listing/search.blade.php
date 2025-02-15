<!-- Search Form -->
<div>
    <form
        id="searchForm"
        action="{{ route('pages.listing.index') }}"
        class="uk-visible@s z-10 bg-white rounded-full flex justify-between items-center absolute left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 px-2 w-[85vw] lg:w-[91vw] xl:w-[67vw] h-[50px] xl:h-[70px]"
        autocomplete="off"
    >
        <input
            type="hidden"
            name="requestType"
            value="search"
        />

        <div class="animate-spin-fast">
            <img
                src="{{ asset('assets/images/icons/circle.png') }}"
                alt="circle"
                class="w-6 lg:w-8 xl:w-10"
            />
        </div>

        <x-ui.search.keywords-input />

        <x-ui.search.type-input :types="$types" />

        <x-ui.search.location-input />

        <x-ui.search.beds-input />

        <x-ui.search.price-input
            :step="100"
            :minValue="0"
            :maxValue="$maxPrice"
        />

        <div class="h-full flex items-center justify-end w-[8%] md:space-x-2 xl:space-x-3">
            <button
                class="text-xl md:text-3xl bg-transparent border-none outline-none"
                type="button"
                uk-toggle="target: #searchModal"
            >
                +
            </button>
            <button
                class="w-6 h-6 lg:w-8 lg:h-8 xl:w-10 xl:h-10 bg-primary rounded-full flex items-center justify-center"
                type="submit"
            >
                <img
                    class="w-3 lg:w-4 xl:w-5"
                    src="{{ asset('assets/images/icons/search.svg') }}"
                    alt="search"
                />
            </button>
        </div>
    </form>
</div>

<!-- Filter Modal -->
<div
    id="searchModal"
    uk-modal
>
    <div class="uk-modal-dialog uk-modal-body w-[85vw] h-[90vh] bg-white rounded-[31px] shadow-card overflow-x-hidden mt-4">
        <form
            id="filterForm"
            action="{{ route('pages.listing.index') }}"
            class="p-4 sm:p-6 lg:p-8 xl:px-11 xl:py-9"
        >
            <div class="flex justify-between items-center">
                <h2 class="section-title">
                    {{ __('general.filter_popup_name') }}
                </h2>

                <div>
                    <button>
                        <img
                            class="uk-modal-close w-5 h-5"
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
            <div class="uk-child-width-1-1 uk-child-width-1-2@m mt-4 sm:mt-6 md:mt-10 xl:mt-20" uk-grid>
                <!-- Keywords -->
                <x-ui.filter.keywords />
                <!-- Price Range -->
                <x-ui.filter.ranges.price-range
                    :step="100"
                    :minValue="0"
                    :maxValue="$maxPrice"
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

            <!--  Results button -->
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
</div>

<script defer>
    const filtersHandler = () => ({
        buttonTextsLocalized: {
            en: 'show results',
            ru: 'показать результаты'
        },
        locale: '{{ app()->getLocale() }}',
        API_URI: '{{ route('hotels.search.count') }}',
        buttonText: '',
        filters: {},

        async fetchResultsCount() {
            try {
                const response = await axios.post(this.API_URI, this.filters, {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });

                this.buttonText = `${this.buttonTextsLocalized[this.locale]} (${response.data.count === 0 ? '' : response.data.count})`;
            } catch (error) {
                console.error('Error updating results count:', error);
                this.buttonText = 'Error loading results';
            }
        },

        updateFilters() {
            this.filters = Object.fromEntries(new FormData(document.getElementById('filterForm')).entries());
            this.fetchResultsCount();
        },

        init() {
            document.addEventListener('DOMContentLoaded', () => {
                this.updateFilters();
                // Add event listeners to filter inputs
                const observer = new MutationObserver(mutations => {
                    mutations.forEach(() => {
                        this.updateFilters();
                    });
                });
                const formInputs = document.querySelectorAll('#filterForm input[type="hidden"]');
                formInputs.forEach(input => {
                    observer.observe(input, { attributes: true, attributeFilter: ['value'] });
                });
            });
        }
    });
</script>
