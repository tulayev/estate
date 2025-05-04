@props([
    'topicCategories' => null,
])

<main class="main-section relative p-2">
    <img
        class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
        src="{{ asset('assets/images/insights/index/main-bg.png') }}"
        alt="main"
    />
    <div class="px-10 container absolute-centralize">
        <div class="main-wrapper">
            <div class="flex flex-row items-left">
                <h1 class="main-title animLeft mt-2 lg:mt-10">
                    {!! __('insight/index/main.title') !!}
                </h1>
                <span class="hidden text-white  text-lg animLeft  ml-2 p-2 lg:mt-10">
                    1h
                </span>
            </div>

            <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                <div class="pl-2 text-white">
                    {!! __('insight/index/main.main_desc') !!}
                </div>
            </div>

            @if ($topicCategories)
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 mt-4 md:mt-12 xl:mt-16">
                    @foreach($topicCategories as $category)
                        <div class="animLeft">
                            <a
                                href="{{ route('pages.insight.index', ['category' => $category->id]) }}"
                                class="secondary-button bg-color-{{ $category->id }} hover:text-primary"
                            >
                                <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">
                                    {{ $category->title }}
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <!-- Search -->
    <x-layout.insight.search />
</main>
