@props([
    'fromInputName' => '',
    'toInputName' => '',
    'step' => 0,
    'minValue' => 0,
    'maxValue' => 0,
])

<div
    x-data="bedRange()"
    x-init="minBedTrigger(); maxBedTrigger()"
    class="w-[130px] sm:w-[300px] md:w-[430px] lg:w-[520px]"
>
    <input
        name="{{ $fromInputName }}"
        type="hidden"
        x-on:input.debounce="minBedTrigger"
        x-model="minBed"
        wire:model.debounce.300="minBed"
    />
    <input
        name="{{ $toInputName }}"
        type="hidden"
        x-on:input.debounce.300="maxBedTrigger"
        x-model="maxBed"
        wire:model.debounce="maxBed"
    />

    <div class="flex justify-center items-center">
        <div class="relative w-full">

            <!-- Range Inputs -->
            <input
                type="range"
                step="{{ $step }}"
                x-bind:min="{{ $minValue }}"
                x-bind:max="{{ $maxValue }}"
                x-on:input="minBedTrigger"
                x-model="minBed"
                class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
            />
            <input
                type="range"
                step="{{ $step }}"
                x-bind:min="{{ $minValue }}"
                x-bind:max="{{ $maxValue }}"
                x-on:input="maxBedTrigger"
                x-model="maxBed"
                class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer"
            />
            <!-- Thumbs -->
            <div class="relative z-10 h-2">
                <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-primary"></div>
                <div
                    class="absolute z-20 top-0 bottom-0 rounded-md bg-primary"
                    x-bind:style="'right:'+maxBedThumb+'%; left:'+minBedThumb+'%'"
                ></div>
                <div
                    class="absolute bottom-4 left-0 text-secondary"
                    x-text="minBed"
                    x-bind:style="'left: '+minBedThumb+'%'"
                ></div>
                <div
                    class="flex absolute z-30 w-6 h-6 top-0 left-0 bg-primary rounded-full -mt-2"
                    x-bind:style="'left: '+minBedThumb+'%'"
                >
                    <div class="w-3 h-3 bg-white rounded-full m-auto"></div>
                </div>
                <div
                    class="absolute bottom-4 right-0 text-secondary"
                    x-text="maxBed"
                    x-bind:style="'right: '+maxBedThumb+'%'"
                ></div>
                <div
                    class="flex absolute z-30 w-6 h-6 top-0 right-0 bg-primary rounded-full -mt-2"
                    x-bind:style="'right: '+maxBedThumb+'%'"
                >
                    <div class="w-3 h-3 bg-white rounded-full m-auto"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function bedRange() {
        return {
            minBed: {{ $minValue }},
            maxBed: {{ $maxValue }},
            min: {{ $minValue }},
            max: {{ $maxValue }},
            minBedThumb: 0,
            maxBedThumb: 0,

            minBedTrigger() {
                this.validateBed();
                this.minBed = Math.min(this.minBed, this.maxBed - 1); // Ensure minBed is less than maxBed
                this.updateThumbs();
            },

            maxBedTrigger() {
                this.validateBed();
                this.maxBed = Math.max(this.maxBed, this.minBed + 1); // Ensure maxBed is greater than minBed
                this.updateThumbs();
            },

            validateBed() {
                // Clamp minBed within range
                this.minBed = Math.max(this.min, Math.min(this.minBed, this.max));

                // Clamp maxBed within range
                this.maxBed = Math.max(this.min, Math.min(this.maxBed, this.max));
            },

            updateThumbs() {
                // Calculate thumb positions based on validated values
                this.minBedThumb = ((this.minBed - this.min) / (this.max - this.min)) * 100 - 2;
                this.maxBedThumb = 100 - 2 - (((this.maxBed - this.min) / (this.max - this.min)) * 100);
            }
        }
    }
</script>
