@props([
    'topic' => null,
])

@if ($topic)
    <main class="main-section relative">
        <div class="relative w-full h-[350px] lg:h-[500px] xl:h-[750px]">
            <div class="border-rounded absolute inset-0 bg-gradient-to-t from-black to-black/50"></div>
            <img
                class="w-full h-full border-rounded"
                src="{{ Helper::resolveImagePath($topic->image) ?? asset('assets/images/insights/index/main-bg.png') }}"
                alt="{{ $topic->title }}"
            />
        </div>
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
                        {{ Str::limit(Helper::removeHtmlTags($topic->body), 200) }}
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 mt-4 md:mt-12 xl:mt-16">
                    <div class="animLeft">
                        <a
                            href="{{ route('pages.insight.index', ['category' => $topic->category->id]) }}"
                            class="secondary-button {{ $topic->category->color_ui_tag ? 'topic-categories-bg' : 'bg-color-' . $topic->category->id }} hover:text-primary"
                            style="{{ $topic->category->color_ui_tag ? '--topic-categories-bg-color: '.$topic->category->color_ui_tag.';' : '' }}"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">research</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search -->
        <div class="container relative">
            <x-layout.insight.search />
        </div>
    </main>
@endif
