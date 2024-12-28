@props([
    'hotel' => null
])

<h2>{{ $hotel->title }}</h2>

<img src="{{ ImagePathResolver::resolve($hotel->main_image) }}" />
