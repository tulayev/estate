@props([
    'topic' => null,
])

@if ($topic)
    <main class="main-section relative p-2">
        <img
            class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
            src="{{ ImagePathResolver::resolve($topic->image) ?? asset('assets/images/insights/index/main-bg.png') }}"
            alt="{{ $topic->title }}"
        />
        <div class="container absolute-centralize">
            <div class="main-wrapper">
                <div class="flex flex-row items-left justify-between">
                    <h1 class="main-title animLeft mt-2 lg:mt-10">
                        {{ $topic->title }}
                    </h1>
                    <div class="flex flex-row items-center md:items-right space-x-2 text-white text-sm animLeft ml-2 md:p-2 md:mt-10">
                        <div class="border-rounded bg-white/10 text-white p-2">
                            {{ $topic->minutes_to_read }} mins read
                        </div>
                        <div class="border-rounded bg-white/10 text-white p-2">
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
                            href="#"
                            class="main-button-about bg-[#69A8A4]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">research</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#"
                            class="main-button-about bg-[#23334B]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">luxury</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#"
                            class="main-button-about bg-[#767E94]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">summer</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search -->
        <x-layout.insight.search />
    </main>
@endif
