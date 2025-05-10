@props([
    'step' => 0,
    'minValue' => 0,
    'maxValue' => 0,
])

<div class="w-[130px] sm:w-[300px] md:w-[430px] lg:w-[520px]">
    <input
        id="bathroomsMin"
        type="hidden"
        name="bathrooms_min"
    />
    <input
        id="bathroomsMax"
        type="hidden"
        name="bathrooms_max"
    />

    <div class="flex justify-center items-center">
        <div
            class="w-full"
            id="bathSlider"
        ></div>
    </div>
</div>

<script defer>
    document.addEventListener('DOMContentLoaded', () => {
        const bathSlider = document.getElementById('bathSlider');
        const bathroomsMinInput = document.getElementById('bathroomsMin');
        const bathroomsMaxInput = document.getElementById('bathroomsMax');

        noUiSlider.create(bathSlider, {
            start: [{{ $minValue }}, {{ $maxValue }}],
            connect: true,
            range: {
                min: {{ $minValue }},
                max: {{ $maxValue }},
            },
            step: {{ $step }}
        });

        // Create tooltips dynamically
        const bathHandles = bathSlider.querySelectorAll('.noUi-handle');
        bathHandles.forEach(handle => {
            const tooltip = document.createElement('div');
            tooltip.className = 'custom-tooltip';
            tooltip.innerText = '0';
            handle.appendChild(tooltip);
        });

        // Update tooltips and input values on slider change
        bathSlider.noUiSlider.on('update', (values) => {
            bathroomsMinInput.value = Math.round(values[0]);
            bathroomsMaxInput.value = Math.round(values[1]);

            bathHandles[0].querySelector('.custom-tooltip').innerText = Math.round(values[0]);
            bathHandles[1].querySelector('.custom-tooltip').innerText = Math.round(values[1]);
        });
    });
</script>
