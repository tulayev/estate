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
            <div class="mt-4 sm:mt-8 md:mt-12 lg:mt-16 xl:mt-20">
                <p class="mb-8 text-lg">
                    {!! $topic->body !!}
                </p>
                <img
                    class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
                    src="{{ ImagePathResolver::resolve($topic->image) ?? asset('assets/images/insights/index/main-bg.png') }}"
                    alt="{{ $topic->title }}"
                />
            </div>
        </div>
    </section>
@endif
