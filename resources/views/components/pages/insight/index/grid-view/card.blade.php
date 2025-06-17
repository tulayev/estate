@props([
    'topic' => null,
])

@if ($topic)
    <div class="relative group">
        <a
            href="{{ route('pages.insight.show', $topic->slug) }}"
            class="absolute inset-0 z-10">
        </a>
        <div class="relative flex flex-col justify-between p-3 h-[300px]">
            <div class="absolute inset-0">
                <img
                    data-src="{{ Helper::resolveImagePath($topic->image) ?? asset('assets/images/insights/insight-card-bg.png') }}"
                    class="lazy-image"
                    alt="{{ $topic->title }}"
                    loading="lazy"
                />
            </div>
            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
            <!-- Image Top -->
            <div class="relative flex justify-between items-center z-10">
                <div class="flex items-center space-x-2">
                    <a
                        href="{{ route('pages.insight.index', ['category' => $topic->category->id]) }}"
                        class="card-tag-button {{ $topic->category->color_ui_tag ? 'topic-categories-bg' : 'bg-color-' . $topic->category->id }} hover:text-primary"
                        style="{{ $topic->category->color_ui_tag ? '--topic-categories-bg-color: '.$topic->category->color_ui_tag.';' : '' }}"
                    >
                        {{ $topic->category->title }}
                    </a>
                </div>
                <div class="flex items-center space-x-2">
                    <x-ui.buttons.like-button
                        baseUrl="insights"
                        :id="$topic->id"
                        :is-liked="$topic->is_liked"
                    />
                </div>
            </div>
            <!-- Image Bottom -->
            <div class="relative flex justify-between items-center uppercase text-sm sm:text-base md:text-lg">
                <div class="flex items-center space-x-2">
                    <p class="text-white sm:font-bold group-hover:text-primary">
                        {{ Str::limit($topic->title, 10) }}
                    </p>
                </div>
                <div>
                    <span class="text-white sm:font-bold group-hover:text-primary">
                        {{ $topic->minutes_to_read }} min
                    </span>
                </div>
            </div>
        </div>
    </div>
@endif
