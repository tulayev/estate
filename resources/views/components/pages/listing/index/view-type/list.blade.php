@props([
    'hotels' => null,
    'viewType' => '',
])

@foreach($hotels as $hotel)
    @switch($viewType)
        @case('list')
            <x-pages.listing.index.list-view.card
                :hotel="$hotel"
            />
        @break
        @default
            <x-pages.listing.index.grid-view.card
                :hotel="$hotel"
            />
        @break
    @endswitch
@endforeach
