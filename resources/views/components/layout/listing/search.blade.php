<!-- Search Form -->
<div>
    <form
        id="searchForm"
        action="{{ route('pages.listing.index') }}"
        class="uk-visible@s z-10 bg-white rounded-full flex justify-between items-center absolute left-1/2 bottom-0 xl:bottom-[-10px] -translate-x-1/2 px-4 w-[85vw] lg:w-[91vw] xl:w-[65vw] h-[50px] xl:h-[62px]"
        autocomplete="off"
    >
        <input
            type="hidden"
            name="requestType"
            value="search"
        />

        <div class="animate-spin-slow">
            <img
                src="{{ asset('assets/images/icons/circle.png') }}"
                alt="circle"
                class="w-6 lg:w-8 xl:w-10"
            />
        </div>

        <x-ui.search.keywords-input />

        <x-ui.search.type-input :types="$types" />

        <x-ui.search.location-input :locations="$locations" />

        <x-ui.search.beds-input />

        <x-ui.search.price-input
            :step="1"
            :minValue="0"
            :maxValue="$maxPrice"
        />

        <div class="h-full flex items-center justify-end w-[8%] md:space-x-2 xxl:space-x-4">
            <button
                class="text-secondary text-xl md:text-3xl xxl:text-4xl font-black bg-transparent border-none outline-none"
                type="button"
                uk-toggle="target: #searchModal"
            >
                +
            </button>
            <button type="submit">
                <img
                    src="{{ asset('assets/images/icons/search-icon.svg') }}"
                    alt="search"
                    class="w-6 lg:w-8 xl:w-10"
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
            @if ($primary && $resales && $land && $rent)
                <x-ui.filter.types
                    :primary="$primary"
                    :resales="$resales"
                    :land="$land"
                    :rent="$rent"
                />
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
                @php($tags = $tags->where('id', '<>', Constants::SYSTEM_TAG_IDS['land']))
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
                const { data } = await axios.post(this.API_URI, this.filters, {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });

                this.buttonText = `${data.count === 0 ? this.buttonTextsLocalized[this.locale] : `${this.buttonTextsLocalized[this.locale]} (${data.count})`}`;
            } catch (error) {
                console.error('Error updating results count:', error);
                this.buttonText = 'Error loading results';
            }
        },

        updateFilters() {
            const setDisabledStyles = (button) => {
                button.disabled = true;
                button.style.opacity = '0.5';
                button.style.cursor = 'not-allowed';
            };

            const setEnabledStyles = (button) => {
                button.disabled = false;
                button.style.opacity = '1';
                button.style.cursor = 'pointer';
            };

            const filterForm = document.getElementById('filterForm');
            const showResultsButton = document.getElementById('showResultsButton');

            if (filterForm && showResultsButton) {
                this.filters = Object.fromEntries(new FormData(filterForm).entries());

                const { features, locations, tags, types, title } = this.filters;

                if (features === '' && locations === '' && tags === '' && types === '' && title === '') {
                    this.buttonText = this.buttonTextsLocalized[this.locale];
                     setDisabledStyles(showResultsButton);
                } else {
                    this.fetchResultsCount();
                    setEnabledStyles(showResultsButton);
                }
            }
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
