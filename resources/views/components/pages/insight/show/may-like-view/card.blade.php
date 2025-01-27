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
                <h3 class="card-tag-button bg-[#5A6BC9bb]">
                    {{ $topic->category->title }}
                </h3>
            </div>
            <!-- Image Bottom -->
            <a
                href="{{ route('pages.insight.show', $topic->slug) }}"
                class="z-10"
            >
                {{ Str::limit($topic->title, 24) }}
            </a>
        </div>
    </div>
@endif
