@props([
    'hotels' => null
])

@if ($hotels)
    @foreach($hotels as $hotel)
        <a href="{{ route('pages.listing.show', ['slug' => $hotel->slug]) }}" style="margin-right: 20px;">
            {{ $hotel->title }}
        </a>
    @endforeach
@endif
