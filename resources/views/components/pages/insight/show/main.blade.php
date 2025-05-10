@props([
    'topic' => null,
])

@if ($topic)
    <main class="main-section relative p-2">
        <img
            class="main-section-image"
            src="{{ ImagePathResolver::resolve($topic->image) ?? asset('assets/images/insights/index/main-bg.png') }}"
            alt="{{ $topic->title }}"
        />
        <div class="px-10 container absolute-centralize">
            <div class="main-wrapper">
                <div class="flex flex-row items-left justify-between">
                    <h1 class="main-title-insight animLeft mt-2 lg:mt-10 w-1/2 sm:w-3/4">
                        {{ Str::limit($topic->title) }}
                    </h1>

                    <div class="flex flex-row items-center md:items-right space-x-2 text-white text-sm animLeft ml-2 md:p-2 md:mt-10 w-1/2 sm:w-1/4">
                        <div class="border-rounded bg-white/10 text-white p-1 sm:p-2">
                            {{ $topic->minutes_to_read }} mins read
                        </div>
                        <div class="border-rounded bg-white/10 text-white p-1 sm:p-2">
                            👁 {{ $topic->views }}
                        </div>
                    </div>
                </div>

                <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                    <div class="pl-2 text-white">
                        {!! Str::limit($topic->body, 200) !!}
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 mt-4 md:mt-12 xl:mt-16">
                    <div class="animLeft">
                        <a
                            href="{{ route('pages.insight.index', ['category' => $topic->category->id]) }}"
                            class="secondary-button bg-color-{{ $topic->category->id }} hover:text-primary"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">research</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search -->
        <x-layout.insight.search />
    </main>
@endif
