@props([
    'topic' => null,
])

@if ($topic)
    <div>
        <div
            class="relative modal-subtitle text-white bg-cover bg-center bg-no-repeat flex flex-col justify-between border-rounded p-2 sm:px-4 md:px-5 h-[150px] md:h-[200px]"
            style="background-image: url('{{ ImagePathResolver::resolve($topic->image) ?? asset('assets/images/insights/insight-card-bg.png') }}');"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
            <!-- Image Top -->
            <div class="flex justify-end items-center z-10">
                <a
                    href="{{ route('pages.insight.index', ['category' => $topic->category->id]) }}"
                    class="card-tag-button random-bg-color hover:text-primary"
                >
                    {{ Str::limit($topic->category->title, 3) }}
                </a>
            </div>
            <!-- Image Bottom -->
            <a
                href="{{ route('pages.insight.show', $topic->slug) }}"
                class="z-10"
            >
                {{ Str::limit($topic->title, 10) }}
            </a>
        </div>
    </div>
@endif
