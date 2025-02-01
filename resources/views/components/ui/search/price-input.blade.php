@props([
    'step' => 0,
    'minValue' => 0,
    'maxValue' => 0,
])

<div
    x-data="priceDropdown()"
    class="relative px-10 border-r border-borderColor h-full flex items-center justify-center w-[15%] xl:w-[24%]"
>
    <div
        @click="showInputs = true"
        class="w-full flex items-center justify-center cursor-pointer"
        x-show="!showInputs"
    >
        <input
            id="priceInput"
            type="text"
            placeholder="{{ __('general.search_price') }}"
            class="modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
            readonly
        />
    </div>
    <!-- Price Inputs -->
    <div
        class="flex items-center gap-2 w-full justify-center"
        x-show="showInputs"
    >
        <input
            id="priceInputFrom"
            name="price_min"
            type="text"
            class="modal-subtitle text-center bg-[#f4f4f4] rounded-[10px] p-2 border-b border-borderColor w-1/2"
            readonly
        />
        <input
            id="priceInputTo"
            name="price_max"
            type="text"
            class="modal-subtitle text-center bg-[#f4f4f4] rounded-[10px] p-2 border-b border-borderColor w-1/2"
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
            <div
                class="w-full"
                id="priceInputSlider"
            ></div>
        </div>
    </div>
</div>

<script defer>
    function priceDropdown() {
        return {
            showInputs: false,

            resetDropdown() {
                this.showInputs = false;
            }
        };
    }

    document.addEventListener('DOMContentLoaded', () => {
        const priceInputSlider = document.getElementById('priceInputSlider');
        const priceInputFrom = document.getElementById('priceInputFrom');
        const priceInputTo = document.getElementById('priceInputTo');
        const priceInput = document.getElementById('priceInput');

        noUiSlider.create(priceInputSlider, {
            start: [{{ $minValue }}, {{ $maxValue }}],
            connect: true,
            range: {
                min: {{ $minValue }},
                max: {{ $maxValue }},
            },
            step: {{ $step }}
        });

        // Create tooltips dynamically
        const priceInputHandles = priceInputSlider.querySelectorAll('.noUi-handle');
        priceInputHandles.forEach(handle => {
            const tooltip = document.createElement('div');
            tooltip.className = 'custom-tooltip';
            tooltip.innerText = '0';
            handle.appendChild(tooltip);
        });

        // Update tooltips and input values on slider change
        priceInputSlider.noUiSlider.on('update', (values) => {
            priceInputFrom.value = Math.round(values[0]);
            priceInputTo.value = Math.round(values[1]);

            priceInputHandles[0].querySelector('.custom-tooltip').innerText = Math.round(values[0]);
            priceInputHandles[1].querySelector('.custom-tooltip').innerText = Math.round(values[1]);

            priceInput.value = (priceInputFrom.value != {{ $minValue }} && priceInputTo.value != {{ $maxValue }})
                ? `From ${priceInputFrom.value} To ${priceInputTo.value}`
                : '';
        });
    });
</script>
