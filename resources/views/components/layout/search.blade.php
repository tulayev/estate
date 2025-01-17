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
    <div class="pr-5 border-r border-borderColor h-full flex items-center justify-center w-[18%]">
        <input
            type="text"
            name="title"
            placeholder="keywords"
            class="xl:modal-subtitle text-primary placeholder-secondary bg-transparent border-none text-center outline-none"
        />
    </div>

    <x-ui.search.type-input :types="$types" />

    <x-ui.search.location-input />

    <div class="px-6 md:px-10 border-r border-borderColor h-full flex items-center justify-center w-[8%]">
        🛏️
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[15%] xl:w-[24%]">
        <input
            type="text"
            placeholder="price"
            class="xl:modal-subtitle text-primary placeholder-secondary bg-transparent border-none text-center outline-none"
        />
    </div>
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
            <x-ui.filters.types :types="$types" />
        @endif

        <!-- Keywords & Price range -->
        <div class="uk-child-width-1-2 md:pt-10 xl:pt-20" uk-grid>
            <!-- Keywords -->
            <div>
                <h3 class="modal-subtitle text-primary">Keywords</h3>

                <div class="md:pt-4 xl:mt-6">
                    <input
                        name="keywords"
                        type="text"
                        class="modal-subtitle text-primary placeholder-secondary w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                        placeholder="For example"
                    />
                </div>
            </div>
            <!-- Price Range -->
            <x-ui.filters.ranges.price-range
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
            <x-ui.filters.map :locations="$locations" />
        @endif
        <!-- Features -->
        @if ($features)
            <x-ui.filters.features :features="$features" />
        @endif
        <!-- Tags -->
        @if ($tags)
            <x-ui.filters.tags :tags="$tags" />
        @endif

        <!-- Show Results button -->
        <div class="mt-4 sm:mt-6 md:mt-8 lg:mt-12 xl:mt-24">
            <button
                id="showResultsButton"
                type="submit"
                class="w-full bg-primary border-rounded modal-subtitle text-white text-center py-2 sm:py-4 xl:py-7"
            ></button>
        </div>
    </form>
</div>

<script>
    const API_URI = '/api/objects/count';
    const filtersForm = document.getElementById('filterForm');
    const showResultsButton = document.getElementById('showResultsButton');

    const updateResultsCount = async () => {
        const formData = new FormData(filtersForm);
        const filters = Object.fromEntries(formData.entries());

        try {
            const response = await fetch(API_URI, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(filters),
            });

            const data = await response.json();

            // Update the button text
            showResultsButton.textContent = `Show ${data.count === 0 ? '' : data.count} Results`;
        } catch (error) {
            console.error('Error updating results count:', error);
        }
    };

    const filterInputs = filtersForm.querySelectorAll('input, select');
    filterInputs.forEach(input => {
        input.addEventListener('change', updateResultsCount);
    });

    document.addEventListener('DOMContentLoaded', updateResultsCount);
</script>
