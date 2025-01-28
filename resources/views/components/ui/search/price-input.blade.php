@props([
    'maxPrice' => 0,
])

<div
    x-data="priceDropdown()"
    class="relative px-10 border-r border-borderColor h-full flex items-center justify-center w-[15%] xl:w-[24%]"
>
    <input
        type="hidden"
        name="price_min"
        x-model="minPriceHidden"
    />
    <input
        type="hidden"
        name="price_max"
        x-model="maxPriceHidden"
    />
    <div
        @click="showInputs = true"
        class="w-full flex items-center justify-center cursor-pointer"
        x-show="!showInputs"
    >
        <input
            type="text"
            placeholder="{{ __('general.search_price') }}"
            class="modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
            :value="(minPriceHidden !== 0 && maxPriceHidden !== 0) ? `From ${minPriceHidden} To ${maxPriceHidden}` : ''"
            readonly
        />
    </div>
    <!-- Price Inputs -->
    <div
        class="flex items-center gap-2 w-full justify-center"
        x-show="showInputs"
    >
        <input
            type="text"
            class="modal-subtitle text-center bg-[#f4f4f4] rounded-[10px] p-2 border-b border-borderColor w-1/2"
            x-on:input.debounce="minPriceTrigger"
            x-model="minPrice"
            wire:model.debounce.300="minPrice"
            readonly
        />
        <input
            type="text"
            class="modal-subtitle text-center bg-[#f4f4f4] rounded-[10px] p-2 border-b border-borderColor w-1/2"
            x-on:input.debounce.300="maxPriceTrigger"
            x-model="maxPrice"
            wire:model.debounce="maxPrice"
            readonly
        />
    </div>
    <!-- Dropdown -->
    <div
        class="w-full absolute top-16 bg-white shadow-lg border border-borderColor rounded z-50 pt-10 px-4 pb-4"
        x-show="showInputs"
        @click.outside="resetDropdown"
    >
        <div class="flex justify-center items-center">
            <div class="relative w-full">
                <div>
                    <!-- Range Inputs -->
                    <input
                        type="range"
                        step="100"
                        x-bind:min="0"
                        x-bind:max="{{ $maxPrice }}"
                        x-on:input="minPriceTrigger"
                        x-model="minPrice"
                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                    />
                    <input
                        type="range"
                        step="100"
                        x-bind:min="0"
                        x-bind:max="{{ $maxPrice }}"
                        x-on:input="maxPriceTrigger"
                        x-model="maxPrice"
                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                    />
                    <!-- Thumbs -->
                    <div class="relative z-10 h-2">
                        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-primary"></div>
                        <div
                            class="absolute z-20 top-0 bottom-0 rounded-md bg-primary"
                            x-bind:style="'right:'+maxPriceThumb+'%; left:'+minPriceThumb+'%'"
                        ></div>
                        <div
                            class="absolute bottom-4 left-0 text-secondary"
                            x-text="minPrice"
                            x-bind:style="'left: '+minPriceThumb+'%'"
                        ></div>
                        <div
                            class="flex absolute z-30 w-6 h-6 top-0 left-0 bg-primary rounded-full -mt-2"
                            x-bind:style="'left: '+minPriceThumb+'%'"
                        >
                            <div class="w-3 h-3 bg-white rounded-full m-auto"></div>
                        </div>
                        <div
                            class="absolute bottom-4 right-0 text-secondary"
                            x-text="maxPrice"
                            x-bind:style="'right: '+maxPriceThumb+'%'"
                        ></div>
                        <div
                            class="flex absolute z-30 w-6 h-6 top-0 right-0 bg-primary rounded-full -mt-2"
                            x-bind:style="'right: '+maxPriceThumb+'%'"
                        >
                            <div class="w-3 h-3 bg-white rounded-full m-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function priceDropdown() {
        return {
            minPriceHidden: 0,
            maxPriceHidden: 0,
            showInputs: false,
            minPrice: 0,
            maxPrice: {{ $maxPrice }},
            min: 0,
            max: {{ $maxPrice }},
            minPriceThumb: 0,
            maxPriceThumb: 0,

            minPriceTrigger() {
                this.validatePrices();
                this.minPrice = Math.min(this.minPrice, this.maxPrice - 1); // Ensure minPrice < maxPrice
                this.updateThumbs();
            },

            maxPriceTrigger() {
                this.validatePrices();
                this.maxPrice = Math.max(this.maxPrice, this.minPrice + 1); // Ensure maxPrice > minPrice
                this.updateThumbs();
            },

            validatePrices() {
                // Clamp minPrice to valid range
                this.minPrice = Math.max(this.min, Math.min(this.minPrice, this.max));
                // Clamp maxPrice to valid range
                this.maxPrice = Math.max(this.min, Math.min(this.maxPrice, this.max));
            },

            updateThumbs() {
                this.minPriceThumb = ((this.minPrice - this.min) / (this.max - this.min)) * 100 - 2;
                this.maxPriceThumb = 100 - 2 - (((this.maxPrice - this.min) / (this.max - this.min)) * 100);
            },

            resetDropdown() {
                // Hide inputs and reset prices
                this.showInputs = false;
                this.minPriceHidden = this.minPrice;
                this.maxPriceHidden = this.maxPrice;
                this.minPrice = 1;
                this.maxPrice = 100;
                this.min = 1;
                this.max = 1000000;
                this.minPriceThumb = 0;
                this.maxPriceThumb = 0;
            },
        };
    }
</script>
