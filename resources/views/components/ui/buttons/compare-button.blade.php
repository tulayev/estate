@props([
    'hotelId' => 0,
])

<button
    data-compare-id="{{ $hotelId }}"
    title="{{ __('listing/compare.add_to_comparison') }}"
>
    <img
        src="{{ asset('assets/images/icons/compare.svg') }}"
        alt="{{ __('listing/compare.compare') }}"
    />
</button>
