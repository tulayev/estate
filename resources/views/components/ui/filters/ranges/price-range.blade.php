@props([
    'fromInputName' => '',
    'toInputName' => '',
    'minLength' => 0,
    'maxLength' => 0,
    'step' => 1,
    'minValue' => 0,
    'maxValue' => 1,
])

<div
    x-data="priceRange()"
    x-init="minPriceTrigger(); maxPriceTrigger()"
>
    <h3 class="modal-subtitle text-primary">Price range</h3>

    <div class="uk-child-width-1-2" uk-grid>
        <div class="mt-6">
            <input
                name="{{ $fromInputName }}"
                type="text"
                class="modal-subtitle text-primary placeholder-primary placeholder-opacity-50 w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                placeholder="From"
                minlength="{{ $minLength }}"
                maxlength="{{ $maxLength }}"
                x-on:input.debounce="minPriceTrigger"
                x-model="minPrice"
                wire:model.debounce.300="minPrice"
            />
        </div>
        <div class="mt-6">
            <input
                name="{{ $toInputName }}"
                type="text"
                class="modal-subtitle text-primary placeholder-primary placeholder-opacity-50 w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                placeholder="To"
                minlength="{{ $minLength }}"
                maxlength="{{ $maxLength }}"
                x-on:input.debounce.300="maxPriceTrigger"
                x-model="maxPrice"
                wire:model.debounce="maxPrice"
            />
        </div>
    </div>
    <div class="mt-12 flex justify-center items-center">
        <div class="relative w-full">
            <div>
                <!-- Range Inputs -->
                <input
                    type="range"
                    step="{{ $step }}"
                    x-bind:min="{{ $minValue }}"
                    x-bind:max="{{ $maxValue }}"
                    x-on:input="minPriceTrigger"
                    x-model="minPrice"
                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                />
                <input
                    type="range"
                    step="{{ $step }}"
                    x-bind:min="{{ $minValue }}"
                    x-bind:max="{{ $maxValue }}"
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
                        class="absolute z-30 w-6 h-6 top-0 left-0 bg-primary rounded-full -mt-2"
                        x-bind:style="'left: '+minPriceThumb+'%'"
                    ></div>
                    <div
                        class="absolute bottom-4 right-0 text-secondary"
                        x-text="maxPrice"
                        x-bind:style="'right: '+maxPriceThumb+'%'"
                    ></div>
                    <div
                        class="absolute z-30 w-6 h-6 top-0 right-0 bg-primary rounded-full -mt-2"
                        x-bind:style="'right: '+maxPriceThumb+'%'"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function priceRange() {
        return {
            minPrice: {{ $minValue }},
            maxPrice: {{ $maxValue }},
            min: {{ $minValue }},
            max: {{ $maxValue }},
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
                // Calculate thumb positions after validation
                this.minPriceThumb = ((this.minPrice - this.min) / (this.max - this.min)) * 100;
                this.maxPriceThumb = 100 - (((this.maxPrice - this.min) / (this.max - this.min)) * 100);
            }
        }
    }
</script>
