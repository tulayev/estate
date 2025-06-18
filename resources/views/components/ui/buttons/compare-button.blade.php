@props([
    'hotelId' => 0,
])

<button
    x-data="compareHandler({{ $hotelId }})"
    @click.stop="toggleCompare"
>
    <img
        :src="isCompared ? '{{ asset('assets/images/icons/compare-minus.svg') }}' : '{{ asset('assets/images/icons/compare-plus.svg') }}'"
        alt="compare icon"
    />
</button>
