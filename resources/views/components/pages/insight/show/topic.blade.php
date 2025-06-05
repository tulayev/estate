@props([
    'topic' => null,
])

@if ($topic)
    <section class="section">
        <div class="container">
            <div class="flex items-center justify-between">
                <h2 class="section-title">
                    {{ $topic->title }}
                </h2>
            </div>
            <div class="mt-4 sm:mt-8 lg:mt-12">
                {!! $topic->body !!}
            </div>
        </div>
    </section>
@endif
