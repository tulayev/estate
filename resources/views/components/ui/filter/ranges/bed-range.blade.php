@props([
    'step' => 0,
    'minValue' => 0,
    'maxValue' => 0,
])

<div class="w-[130px] sm:w-[300px] md:w-[430px] lg:w-[520px]">
    <input
        id="bedFrom"
        name="bedrooms_min"
        type="hidden"
    />
    <input
        id="bedTo"
        name="bedrooms_max"
        type="hidden"
    />

    <div class="flex justify-center items-center">
        <div
            class="w-full"
            id="bedSlider"
        ></div>
    </div>
</div>

<script defer>
    document.addEventListener('DOMContentLoaded', () => {
        const bedSlider = document.getElementById('bedSlider');
        const bedFromInput = document.getElementById('bedFrom');
        const bedToInput = document.getElementById('bedTo');

        noUiSlider.create(bedSlider, {
            start: [{{ $minValue }}, {{ $maxValue }}],
            connect: true,
            range: {
                min: {{ $minValue }},
                max: {{ $maxValue }},
            },
            step: {{ $step }}
        });

        // Create tooltips dynamically
        const bedHandles = bedSlider.querySelectorAll('.noUi-handle');
        bedHandles.forEach(handle => {
            const tooltip = document.createElement('div');
            tooltip.className = 'custom-tooltip';
            tooltip.innerText = '0';
            handle.appendChild(tooltip);
        });

        // Update tooltips and input values on slider change
        bedSlider.noUiSlider.on('update', (values) => {
            bedFromInput.value = Math.round(values[0]);
            bedToInput.value = Math.round(values[1]);

            bedHandles[0].querySelector('.custom-tooltip').innerText = Math.round(values[0]);
            bedHandles[1].querySelector('.custom-tooltip').innerText = Math.round(values[1]);
        });
    });
</script>
