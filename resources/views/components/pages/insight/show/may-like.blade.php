@props([
    'similarTopics' => null,
])

@if ($similarTopics)
    <section class="section">
        <div class="container flex items-center justify-between">
            <h2 class="section-title flex space-x-3">
                you may also like
            </h2>

            <div class="space-x-3 hidden sm:flex">
                <button class="primary-button">
                    previous
                </button>
                <button class="primary-button">
                    next
                </button>
            </div>
        </div>

        <div class="mt-4 md:mt-8 lg:mt-12 xl:mt-16 swiper">
            <div class="swiper-wrapper">
                @foreach($similarTopics as $topic)
                    <div class="swiper-slide">
                        <x-pages.insight.show.may-like-view.card
                            :topic="$topic"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
