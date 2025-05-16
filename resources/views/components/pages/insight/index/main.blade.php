@props([
    'latestTopics' => null,
])

@if ($latestTopics)
    <main class="main-section relative">
        <div class="swiper insights-slider">
            <div class="swiper-wrapper">
                @foreach($latestTopics as $topic)
                    <div class="swiper-slide">
                        <div class="absolute inset-0 bg-gradient-to-t from-black to-black/50"></div>
                        <img
                            class="w-full h-[250px] lg:h-[500px] xl:h-[750px]"
                            src="{{ ImagePathResolver::resolve($topic->image) ?? asset('assets/images/insights/index/main-bg.png') }}"
                            alt="{{ $topic->title }}"
                        />
                        <div class="px-10 container absolute-centralize">
                            <div class="main-wrapper">
                                <div class="flex flex-row items-left">
                                    <a
                                        href="{{ route('pages.insight.show', ['slug' => $topic->slug]) }}"
                                        class="group"
                                    >
                                        <h1 class="main-title-insight animLeft mt-2 lg:mt-10 group-hover:text-primary">
                                            {{ $topic->title }}
                                        </h1>
                                    </a>
                                    <span class="hidden text-white  text-lg animLeft ml-2 p-2 lg:mt-10">
                                        {{ $topic->minutes_to_read }}
                                    </span>
                                </div>

                                <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                                    <div class="pl-2 text-white">
                                        {!! $topic->body !!}
                                    </div>
                                </div>

                                <div class="animLeft mt-4 md:mt-12 xl:mt-16">
                                    <a
                                        href="{{ route('pages.insight.index', ['category' => $topic->category->id]) }}"
                                        class="secondary-button bg-color-{{ $topic->category->id }} hover:text-primary"
                                    >
                                        <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">
                                            {{ $topic->category->title }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Swiper Pagination -->
            <div class="swiper-pagination mb-2 md:mb-8 xl:mb-12"></div>
        </div>
        <!-- Search -->
        <x-layout.insight.search />
    </main>
@endif
