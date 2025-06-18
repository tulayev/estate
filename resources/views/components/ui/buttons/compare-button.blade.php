@props([
    'hotelId' => 0,
])

<button data-compare-id="{{ $hotelId }}">
    <img
        src="{{ asset('assets/images/icons/compare-plus.svg') }}"
        alt="{{ __('listing/compare.compare') }}"
    />
</button>
