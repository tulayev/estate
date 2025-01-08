<div class="hidden absolute left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 text-[#C6C6C6] z-[99] bg-white font-600 uppercase rounded-full sm:flex items-center px-3 w-[90vw] lg:w-[70vw] h-[50px] xl:h-[70px] text-sm xl:text-base xlWide:text-xl">
    <div>
        <img
            src="{{ asset('assets/images/circle.png') }}"
            alt="circle"
            class="w-10"
        />
    </div>
    <div class="pr-5 border-r border-borderColor h-full flex items-center justify-center w-[18%]">
        <input
            type="text"
            placeholder="keywords"
            class="bg-transparent border-none text-center outline-none uppercase"
        />
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[15%]">
        <input
            type="text"
            placeholder="type"
            class="bg-transparent border-none text-center outline-none uppercase"
        />
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[20%]">
        <p>location</p>
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[8%]">
        🛏️
    </div>
    <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[24%]">
        <p>price</p>
    </div>
    <div class="h-full flex items-center justify-end w-[10%] space-x-5">
        <button
            class="text-3xl bg-transparent border-none outline-none cursor-pointer"
            uk-toggle="target: #searchModal"
        >
            +
        </button>
        <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px]">
            <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px] bg-[#0F1F3D] rounded-full flex items-center justify-center">
                <img
                    class="w-[14px] xl:w-[20px]"
                    src="{{ asset('assets/images/search.svg') }}"
                    alt="search"
                />
            </div>
        </div>
    </div>
</div>

<!-- Search Modal -->
<div
    id="searchModal"
    class="w-[85%] h-[90%] m-auto bg-white rounded-[31px]"
    uk-modal
>
    <form
        id="filterForm"
        action="{{ route('pages.listing.index') }}"
        class="px-11 py-9"
    >
        <div class="flex justify-between items-center">
            <h2 class="section-title">
                filters
            </h2>

            <div>
                <button>
                    <img
                        class="uk-modal-close"
                        src="{{ asset('assets/images/modal-close.svg') }}"
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
        <div class="uk-child-width-1-2 pt-20" uk-grid>
            <!-- Keywords -->
            <div>
                <h3 class="modal-subtitle text-primary">Keywords</h3>

                <div class="mt-6">
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

        <!-- Features -->
        @if ($features)
            <x-ui.filters.features :features="$features" />
        @endif
        <!-- Tags -->
        @if ($tags)
            <x-ui.filters.tags :tags="$tags" />
        @endif

        <!-- Show Results button -->
        <div class="mt-24">
            <button
                id="showResultsButton"
                type="submit"
                class="w-full py-7 bg-primary rounded-[25px] modal-subtitle text-white text-center"
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
            showResultsButton.textContent = `Show ${data.count} Results`;
        } catch (error) {
            console.error('Error updating results count:', error);
        }
    };

    // Event listeners to update results count on filter change
    const filterInputs = filtersForm.querySelectorAll("input, select");
    console.log(filterInputs)
    filterInputs.forEach(input => {
        input.addEventListener('change', updateResultsCount);
    });

    // Initial load
    document.addEventListener('DOMContentLoaded', updateResultsCount);
</script>
