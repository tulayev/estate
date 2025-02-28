@props([
    'step' => 0,
    'minValue' => 0,
    'maxValue' => 0,
])

<div
    x-data="priceDropdown()"
    class="relative border-r border-borderColor h-full flex items-center justify-center w-[28%]"
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
            class="w-full modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
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
            class="w-1/2 modal-subtitle text-center bg-secondary rounded-xl p-2 border-b border-borderColor"
            readonly
        />
        <input
            id="priceInputTo"
            name="price_max"
            type="text"
            class="w-1/2 modal-subtitle text-center bg-secondary rounded-xl p-2 border-b border-borderColor"
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

        // Function to format numbers with thousands separators
        function formatNumberWithCommas(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

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
            const formattedFromValue = formatNumberWithCommas(Math.round(values[0]));
            const formattedToValue = formatNumberWithCommas(Math.round(values[1]));

            priceInputFrom.value = formattedFromValue;
            priceInputTo.value = formattedToValue;

            priceInputHandles[0].querySelector('.custom-tooltip').innerText = formattedFromValue;
            priceInputHandles[1].querySelector('.custom-tooltip').innerText = formattedToValue;

            priceInput.value = (priceInputFrom.value != formatNumberWithCommas({{ $minValue }}) && priceInputTo.value != formatNumberWithCommas({{ $maxValue }}))
                ? `${formattedFromValue} - ${formattedToValue}`
                : '';
        });
    });
</script>
