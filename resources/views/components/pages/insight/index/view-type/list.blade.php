@props([
    'topics' => null,
])

@foreach($topics as $topic)
    <x-pages.insight.index.grid-view.card
        :topic="$topic"
    />
@endforeach
