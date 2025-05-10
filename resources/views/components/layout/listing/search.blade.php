<!-- Search Form -->
@php($searchBarBottomPosition = request()->segment(1) === null ? 'bottom-0 xl:bottom-[-10px]' : 'bottom-0 sm:bottom-[-12px] xl:bottom-[-22px]')
<div>
    <form
        id="listingSearchForm"
        action="{{ route('pages.listing.index') }}"
        class="uk-visible@s z-10 bg-white rounded-full flex justify-between items-center absolute left-1/2 {{ $searchBarBottomPosition }} -translate-x-1/2 px-4 w-[85vw] lg:w-[91vw] xl:w-[65vw] h-[50px] xl:h-[62px]"
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

        <x-ui.listing.search.inputs.keywords-input />

        <x-ui.listing.search.inputs.type-input :types="$types" />

        <x-ui.listing.search.inputs.location-input :locations="$locations" />

        <x-ui.listing.search.inputs.beds-input />

        <x-ui.listing.search.inputs.price-input
            :step="1"
            :minValue="0"
            :maxValue="$maxPrice"
        />

        <div class="h-full flex items-center justify-end w-[8%] md:space-x-2 xxl:space-x-4">
            <button
                class="text-secondary text-xl md:text-3xl xxl:text-4xl font-black bg-transparent border-none outline-none"
                type="button"
                uk-toggle="target: #listingFilterModal"
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
    id="listingFilterModal"
    uk-modal
>
    <div class="uk-modal-dialog uk-modal-body w-[85vw] h-[90vh] bg-white rounded-[31px] shadow-card overflow-x-hidden mt-4">
        <form
            id="listingFilterForm"
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
                <x-ui.listing.filter.types
                    :primary="$primary"
                    :resales="$resales"
                    :land="$land"
                    :rent="$rent"
                />
            @endif

            <!-- Keywords & Price range -->
            <div class="uk-child-width-1-1 uk-child-width-1-2@m mt-4 sm:mt-6 md:mt-10 xl:mt-20" uk-grid>
                <!-- Keywords -->
                <x-ui.listing.filter.keywords />
                <!-- Price Range -->
                <x-ui.listing.filter.ranges.price-range
                    :step="100"
                    :minValue="0"
                    :maxValue="$maxPrice"
                />
            </div>

            <!-- Map -->
            @if ($locations)
                <x-ui.listing.filter.map :locations="$locations" />
            @endif
            <!-- Features -->
            @if ($features)
                <x-ui.listing.filter.features :features="$features" />
            @endif
            <!-- Tags -->
            @if ($tags)
                @php($tags = $tags->where('id', '<>', Constants::SYSTEM_TAG_IDS['land']))
                <x-ui.listing.filter.tags :tags="$tags" />
            @endif

            <!--  Results button -->
            <div
                x-data="filtersHandler()"
                class="mt-4 sm:mt-6 md:mt-8 lg:mt-12 xl:mt-24"
            >
                <button
                    id="showResultsButton"
                    class="w-full bg-primary border-rounded modal-subtitle text-white text-center py-2 sm:py-4 xl:py-7"
                    x-text="buttonText"
                    @click.prevent="submitSearch"
                ></button>
            </div>
        </form>
    </div>
</div>

<script defer>
    function filtersHandler() {
        return {
            buttonTextsLocalized: {
                en: 'show results',
                ru: 'показать результаты'
            },
            locale: '{{ app()->getLocale() }}',
            API_URI: '{{ route('hotels.search.count') }}',
            buttonText: '',
            filters: {},
            touchedFields: {},
            fetchResultsCountDebounced: null,
            resultsCount: 0,

            async fetchResultsCount() {
                try {
                    const {data} = await axios.post(this.API_URI, this.filters, {
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                    });

                    this.resultsCount = data.count;
                    this.buttonText = `${this.resultsCount === 0 ? this.buttonTextsLocalized[this.locale] : `${this.buttonTextsLocalized[this.locale]} (${this.resultsCount})`}`;
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

                const listingFilterForm = document.getElementById('listingFilterForm');
                const showResultsButton = document.getElementById('showResultsButton');

                if (listingFilterForm && showResultsButton) {
                    const filters = {};

                    for (const [key, value] of Object.entries(this.touchedFields)) {
                        filters[key] = value;
                    }

                    this.filters = filters;

                    if (Object.keys(filters).length === 0 || Object.values(filters).every(v => v === '')) {
                        this.buttonText = this.buttonTextsLocalized[this.locale];
                        setDisabledStyles(showResultsButton);
                    } else {
                        this.fetchResultsCountDebounced();
                        setEnabledStyles(showResultsButton);
                    }
                }
            },

            submitSearch() {
                const params = new URLSearchParams();

                for (const [key, value] of Object.entries(this.touchedFields)) {
                    if (Array.isArray(value)) {
                        value.forEach(v => params.append(key, v));
                    } else {
                        params.append(key, value);
                    }
                }

                window.location.href = `{{ route('pages.listing.index') }}?${params}`;
            },

            debounce(func, wait) {
                let timeout;
                return function (...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), wait);
                };
            },

            init() {
                document.addEventListener('DOMContentLoaded', () => {
                    const listingFilterForm = document.getElementById('listingFilterForm');

                    if (!listingFilterForm) {
                        return;
                    }
                    this.fetchResultsCountDebounced = this.debounce(this.fetchResultsCount.bind(this), 300);
                    this.updateFilters();

                    // Handle hidden inputs updated by JS and populate form data
                    const observer = new MutationObserver(mutations => {
                        mutations.forEach(mutation => {
                            const input = mutation.target;

                            if (input.name) {
                                this.touchedFields[input.name] = input.value;
                                this.updateFilters();
                            }
                        });
                    });

                    // Hidden inputs
                    const hiddenInputs = listingFilterForm.querySelectorAll('input[type="hidden"]');
                    hiddenInputs.forEach(input => {
                        observer.observe(input, { attributes: true, attributeFilter: ['value'] });
                    });

                    // Checkboxes
                    const checkboxes = listingFilterForm.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', () => {
                            if (checkbox.name) {
                                this.touchedFields[checkbox.name] = !!checkbox.checked;
                                this.updateFilters();
                            }
                        });
                    });
                });
            }
        }
    }
</script>
