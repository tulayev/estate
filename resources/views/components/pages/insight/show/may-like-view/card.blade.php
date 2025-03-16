@props([
    'topic' => null,
])

@if ($topic)
    <div>
        <a href="{{ route('pages.insight.show', $topic->slug) }}">
            <div class="relative modal-subtitle text-white flex flex-col justify-between p-2 sm:px-4 md:px-5 h-[150px] md:h-[200px]">
                <div class="absolute inset-0">
                    <img
                        data-src="{{ ImagePathResolver::resolve($topic->image) ?? asset('assets/images/insights/insight-card-bg.png') }}"
                        class="lazy-image"
                        alt="{{ $topic->title }}"
                        loading="lazy"
                    />
                </div>
                <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                <!-- Image Top -->
                <div class="absolute">
                    <div class="flex justify-end items-center">
                        <a
                            href="{{ route('pages.insight.index', ['category' => $topic->category->id]) }}"
                            class="card-tag-button bg-color-{{ $topic->category->id }} hover:text-primary"
                        >
                            {{ Str::limit($topic->category->title, 3) }}
                        </a>
                    </div>
                </div>
                <!-- Image Bottom -->
                <div class="relative">
                    {{ Str::limit($topic->title, 10) }}
                </div>
            </div>
        </a>
    </div>
@endif
