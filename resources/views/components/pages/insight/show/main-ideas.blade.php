@props([
    'topic' => null,
])

@if ($topic && $topic->main_ideas)
    <section class="pt-12">
        <div class="container">
            <div class="card bg-white border-rounded px-8 py-6 xl:px-12 xl:py-8">
                <h2 class="section-title">Main ideas</h2>

                <div class="mt-2 sm:mt-4 xl:mt-8">
                    {!! $topic->main_ideas !!}
                </div>
            </div>
        </div>
    </section>
@endif
