<!-- Search Form -->
<div>
    <form
        id="insightSearchForm"
        action="{{ route('pages.insight.index') }}"
        class="uk-visible@s z-10 bg-white rounded-full flex justify-between items-center absolute left-1/2 bottom-[-25px] xl:bottom-[-30px] -translate-x-1/2 px-4 w-[95%] h-[50px] xl:h-[62px]"
        autocomplete="off"
    >
        <div class="animate-spin-slow">
            <img
                src="{{ asset('assets/images/icons/circle.png') }}"
                alt="circle"
                class="w-6 lg:w-8 xl:w-10"
            />
        </div>

        <x-ui.insight.search.inputs.title-input />

        <x-ui.insight.search.inputs.topic-category-input :topicCategories="$topicCategories" />

        <div class="h-full flex items-center justify-end w-[8%] space-x-4">
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
    id="insightFilterModal"
    uk-modal
>
    <div class="uk-modal-dialog uk-modal-body w-[85vw] h-[40vh] bg-white rounded-[31px] shadow-card overflow-x-hidden mt-4">
        <form
            id="insightFilterForm"
            action="{{ route('pages.insight.index') }}"
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

            <!-- Topic Categories -->
            @if ($topicCategories)
                <x-ui.insight.filter.topic-categories :topicCategories="$topicCategories" />
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
            API_URI: '{{ route('topics.search.count') }}',
            buttonText: '',
            filters: {},
            touchedFields: {},
            fetchResultsCountDebounced: null,
            resultsCount: 0,

            async fetchResultsCount() {
                try {
                    const response = await fetch(this.API_URI, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(this.filters),
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();

                    this.resultsCount = data.count;
                    this.buttonText = `${this.resultsCount === 0 
                        ? this.buttonTextsLocalized[this.locale] 
                        : `${this.buttonTextsLocalized[this.locale]} (${this.resultsCount})`}`;
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

                const insightFilterForm = document.getElementById('insightFilterForm');
                const showResultsButton = document.getElementById('showResultsButton');

                if (insightFilterForm && showResultsButton) {
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

                window.location.href = `{{ route('pages.insight.index') }}?${params}`;
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
                    const insightFilterForm = document.getElementById('insightFilterForm');

                    if (!insightFilterForm) {
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
                    const hiddenInputs = insightFilterForm.querySelectorAll('input[type="hidden"]');
                    hiddenInputs.forEach(input => {
                        observer.observe(input, { attributes: true, attributeFilter: ['value'] });
                    });
                });
            }
        }
    }
</script>
