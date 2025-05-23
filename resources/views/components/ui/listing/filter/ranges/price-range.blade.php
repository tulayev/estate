@props([
    'step' => 0,
    'minValue' => 0,
    'maxValue' => 0,
])

<div>
    <h3 class="modal-subtitle text-primary">{{ __('general.filter_popup_price') }}</h3>

    <div class="uk-child-width-1-2 mt-2 md:mt-4 xl:mt-6" uk-grid>
        <input
            id="priceMin"
            type="hidden"
            name="price_min"
            value=""
        />

        <input
            id="priceMax"
            type="hidden"
            name="price_max"
            value=""
        />

        <div>
            <input
                id="priceFrom"
                type="text"
                class="modal-subtitle text-primary placeholder-primary placeholder-opacity-50 w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                placeholder="From"
            />
        </div>
        <div>
            <input
                id="priceTo"
                type="text"
                class="modal-subtitle text-primary placeholder-primary placeholder-opacity-50 w-full py-4 border-b-[2px] border-borderColor focus:outline-none focus:border-blue-500"
                placeholder="To"
            />
        </div>
    </div>
    <div class="px-2.5 mt-4 md:mt-8 xl:mt-12 flex justify-center items-center">
        <div
            class="w-full"
            id="priceSlider"
        ></div>
    </div>
</div>

<script defer>
    document.addEventListener('DOMContentLoaded', () => {
        const priceSlider = document.getElementById('priceSlider');
        const priceFromInput = document.getElementById('priceFrom');
        const priceToInput = document.getElementById('priceTo');
        const priceMin = document.getElementById('priceMin');
        const priceMax = document.getElementById('priceMax');

        noUiSlider.create(priceSlider, {
            start: [{{ $minValue }}, {{ $maxValue }}],
            connect: true,
            range: {
                min: {{ $minValue }},
                max: {{ $maxValue }},
            },
            step: {{ $step }}
        });

        // Create tooltips dynamically
        const priceHandles = priceSlider.querySelectorAll('.noUi-handle');
        priceHandles.forEach(handle => {
            const tooltip = document.createElement('div');
            tooltip.className = 'custom-tooltip';
            tooltip.innerText = '0';
            handle.appendChild(tooltip);
        });

        // Update tooltips and input values on slider change
        priceSlider.noUiSlider.on('update', (values) => {
            const minValue = Math.round(values[0]);
            const maxValue = Math.round(values[1]);

            priceMin.setAttribute('value', minValue);
            priceMax.setAttribute('value', maxValue);

            const formattedValue0 = minValue.toLocaleString();
            const formattedValue1 = maxValue.toLocaleString();

            priceFromInput.value = formattedValue0;
            priceToInput.value = formattedValue1;

            priceHandles[0].querySelector('.custom-tooltip').innerText = formattedValue0;
            priceHandles[1].querySelector('.custom-tooltip').innerText = formattedValue1;
        });
    });
</script>
