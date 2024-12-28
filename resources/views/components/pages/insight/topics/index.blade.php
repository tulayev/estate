@props([
    'topics' => null
])

@if ($topics)
    @foreach($topics as $topic)
        <a href="{{ route('pages.insight.show', ['slug' => $topic->slug]) }}" style="margin-right: 20px;">
            {{ $topic->title }}
        </a>
    @endforeach
@endif
