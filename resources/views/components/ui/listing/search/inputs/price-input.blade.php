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
        />
        <input
            id="priceInputTo"
            name="price_max"
            type="text"
            class="w-1/2 modal-subtitle text-center bg-secondary rounded-xl p-2 border-b border-borderColor"
        />
    </div>
    <!-- Dropdown -->
    <div
        class="pt-10 px-4 pb-4 absolute top-16 bg-white border border-borderColor w-full rounded-b-[14px] shadow-lg z-50"
        x-show="showInputs"
        @click.outside="closeDropdown($event)"
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

            closeDropdown(event) {
                const fromInput = document.getElementById('priceInputFrom');
                const toInput = document.getElementById('priceInputTo');
                const priceInput = document.getElementById('priceInput');

                if (!fromInput.contains(event.target) && !toInput.contains(event.target) && !priceInput.contains(event.target)) {
                    this.showInputs = false;
                }
            },
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
            step: {{ $step }},
            format: {
                to: (value) => parseInt(value), // Avoid rounding issues
                from: (value) => Number(value) // Directly parse the number
            }
        });

        const priceInputHandles = priceInputSlider.querySelectorAll('.noUi-handle');
        priceInputHandles.forEach(handle => {
            const tooltip = document.createElement('div');
            tooltip.className = 'custom-tooltip';
            tooltip.innerText = '0';
            handle.appendChild(tooltip);
        });

        // Update tooltips and input values on slider change
        priceInputSlider.noUiSlider.on('update', (values) => {
            const fromValue = values[0];
            const toValue = values[1];

            priceInputFrom.value = fromValue;
            priceInputTo.value = toValue;

            priceInputHandles[0].querySelector('.custom-tooltip').innerText = formatNumberWithCommas(fromValue);
            priceInputHandles[1].querySelector('.custom-tooltip').innerText = formatNumberWithCommas(toValue);

            priceInput.value = (fromValue !== {{ $minValue }} || toValue !== {{ $maxValue }})
                ? `${formatNumberWithCommas(fromValue)} - ${formatNumberWithCommas(toValue)}`
                : '';
        });

        priceInputFrom.addEventListener('blur', () => {
            const fromVal = parseInputValue(priceInputFrom.value, {{ $minValue }});
            const toVal = parseInputValue(priceInputTo.value, {{ $maxValue }});
            priceInputSlider.noUiSlider.set([fromVal, null]);
            priceInputFrom.value = formatNumberWithCommas(fromVal);
        });

        priceInputTo.addEventListener('blur', () => {
            const fromVal = parseInputValue(priceInputFrom.value, {{ $minValue }});
            const toVal = parseInputValue(priceInputTo.value, {{ $maxValue }});
            priceInputSlider.noUiSlider.set([null, toVal]);
            priceInputTo.value = formatNumberWithCommas(toVal);
        });

        priceInputFrom.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/[^\d]/g, '');
        });

        priceInputTo.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/[^\d]/g, '');
        });

        function parseInputValue(value, defaultValue) {
            const num = Number(value.replace(/\D/g, ''));
            return isNaN(num) ? defaultValue : num;
        }

        function formatNumberWithCommas(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    });
</script>
