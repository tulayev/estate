<main class="main-section relative p-2">
    <img
        class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
        src="{{ asset('assets/images/insights/index/main-bg.png') }}"
        alt="main"
    />
    <div class="container absolute-centralize">
        <div class="main-wrapper">
            <div class="flex flex-row items-left">
                <h1 class="main-title animLeft mt-2 lg:mt-10">
                    {!! __('insight/index/main.title') !!}
                </h1>
                <span class="text-white  text-lg animLeft  ml-2 p-2 lg:mt-10">
                    1h
                </span>
            </div>

            <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                <div class="pl-2 text-white">
                    {!! __('insight/index/main.main_desc') !!}
                </div>
            </div>

            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 mt-4 md:mt-12 xl:mt-16">
                <div class="animLeft">
                    <a
                        href="#"
                        class="secondary-button bg-[#69A8A4]"
                    >
                        <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">{{ __('insight/index/main.tag_1') }}</span>
                    </a>
                </div>
                <div class="animLeft">
                    <a
                        href="#"
                        class="secondary-button bg-[#23334B]"
                    >
                        <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">{{ __('insight/index/main.tag_1') }}</span>
                    </a>
                </div>
                <div class="animLeft">
                    <a
                        href="#"
                        class="secondary-button bg-[#767E94]"
                    >
                        <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">{{ __('insight/index/main.tag_1') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Search -->
    <x-layout.insight.search />
</main>
