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
    x-data="bathRange()"
    x-init="minBathTrigger(); maxBathTrigger()"
    class="w-[520px]"
>
    <input
        name="{{ $fromInputName }}"
        type="hidden"
        minlength="{{ $minLength }}"
        maxlength="{{ $maxLength }}"
        x-on:input.debounce="minBathTrigger"
        x-model="minBath"
        wire:model.debounce.300="minBath"
    />
    <input
        name="{{ $toInputName }}"
        type="hidden"
        minlength="{{ $minLength }}"
        maxlength="{{ $maxLength }}"
        x-on:input.debounce.300="maxBathTrigger"
        x-model="maxBath"
        wire:model.debounce="maxBath"
    />

    <div class="flex justify-center items-center">
        <div class="relative w-full">

                <!-- Range Inputs -->
                <input
                    type="range"
                    step="{{ $step }}"
                    x-bind:min="{{ $minValue }}"
                    x-bind:max="{{ $maxValue }}"
                    x-on:input="minBathTrigger"
                    x-model="minBath"
                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                />
                <input
                    type="range"
                    step="{{ $step }}"
                    x-bind:min="{{ $minValue }}"
                    x-bind:max="{{ $maxValue }}"
                    x-on:input="maxBathTrigger"
                    x-model="maxBath"
                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
                />
                <!-- Thumbs -->
                <div class="relative z-10 h-2">
                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-primary"></div>
                    <div
                        class="absolute z-20 top-0 bottom-0 rounded-md bg-primary"
                        x-bind:style="'right:'+maxBathThumb+'%; left:'+minBathThumb+'%'"
                    ></div>
                    <div
                        class="absolute bottom-4 left-0 text-secondary"
                        x-text="minBath"
                        x-bind:style="'left: '+minBathThumb+'%'"
                    ></div>
                    <div
                        class="absolute z-30 w-6 h-6 top-0 left-0 bg-primary rounded-full -mt-2"
                        x-bind:style="'left: '+minBathThumb+'%'"
                    ></div>
                    <div
                        class="absolute bottom-4 right-0 text-secondary"
                        x-text="maxBath"
                        x-bind:style="'right: '+maxBathThumb+'%'"
                    ></div>
                    <div
                        class="absolute z-30 w-6 h-6 top-0 right-0 bg-primary rounded-full -mt-2"
                        x-bind:style="'right: '+maxBathThumb+'%'"
                    ></div>
                </div>

        </div>
    </div>
</div>

<script>
    function bathRange() {
        return {
            minBath: {{ $minValue }},
            maxBath: {{ $maxValue }},
            min: {{ $minValue }},
            max: {{ $maxValue }},
            minBathThumb: 0,
            maxBathThumb: 0,

            minBathTrigger() {
                this.validateBath();
                this.minBath = Math.min(this.minBath, this.maxBath - 1); // Ensure minBath is less than maxBath
                this.updateThumbs();
            },

            maxBathTrigger() {
                this.validateBath();
                this.maxBath = Math.max(this.maxBath, this.minBath + 1); // Ensure maxBath is greater than minBath
                this.updateThumbs();
            },

            validateBath() {
                // Clamp minBath within range
                this.minBath = Math.max(this.min, Math.min(this.minBath, this.max));

                // Clamp maxBath within range
                this.maxBath = Math.max(this.min, Math.min(this.maxBath, this.max));
            },

            updateThumbs() {
                // Calculate thumb positions based on validated values
                this.minBathThumb = ((this.minBath - this.min) / (this.max - this.min)) * 100;
                this.maxBathThumb = 100 - (((this.maxBath - this.min) / (this.max - this.min)) * 100);
            }
        }
    }
</script>
