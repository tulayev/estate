<!-- Search Form -->
<form
    id="searchForm"
    action="{{ route('pages.listing.index') }}"
    class="uk-visible@s text-secondary z-10 bg-white font-semibold uppercase rounded-full flex justify-between items-center absolute px-3 left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 w-[90vw] lg:w-[70vw] h-[50px] xl:h-[70px] text-sm xl:text-xl"
    autocomplete="off"
>
    <input
        type="hidden"
        name="requestType"
        value="search"
    />

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

    <x-ui.search.price-input
        :step="100"
        :minValue="0"
        :maxValue="$maxPrice"
    />

    <div class="h-full flex items-center justify-end w-[12%] md:w-[10%] lg:w-[12%] space-x-5">
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

        updateFilters(event) {
            const formData = new FormData(event.target.form);
            this.filters = Object.fromEntries(formData.entries());
            this.fetchResultsCount();
        },

        init() {
            document.addEventListener('DOMContentLoaded', () => {
                // Initialize the filters and fetch results count
                this.filters = Object.fromEntries(new FormData(document.getElementById('filterForm')).entries());
                this.fetchResultsCount();

                // Add event listeners to filter inputs
                document.querySelectorAll('#filterForm input, #filterForm select').forEach(input => {
                    input.addEventListener('change', event => this.updateFilters(event));
                });
            });
        }
    });
</script>
