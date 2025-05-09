@props([
    'similarTopics' => null,
])

@if ($similarTopics)
    <section class="section">
        <div class="container flex items-center justify-between">
            <h2 class="section-title">
                {{ __('insight/show/may-like.title') }}
            </h2>

            <div class="space-x-3 hidden sm:flex">
                <button class="primary-button" onclick="document.getElementById('contactSection').scrollIntoView({behavior: 'smooth'})">
                    {{ __('home/discuss.action_1') }}
                </button>
            </div>
        </div>

        <div class="swiper card-slider mt-4 md:mt-8 lg:mt-12 xl:mt-16">
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
