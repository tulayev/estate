<main class="main-section relative p-2 ">
    <img
        class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
        src="{{ asset('assets/images/listings/index/listings-main-bg.png') }}"
        alt="main"
    />
    <div class="container absolute-centralize ">
        <div
            class="main-wrapper "
            uk-scrollspy="target: .animLeft; cls: uk-animation-slide-left; delay: 300;"
        >
            <div class="flex flex-row items-left ">
                <h1 class="main-title animLeft mt-2 lg:mt-10 ">
                    {{ __('listing/index/main.title') }}
                </h1>

            </div>

            <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                <div class="pl-2 text-white">
                    {!! __('listing/index/main.main_desc') !!}
                </div>
            </div>

            <div class="m-2 w-2/3 md:w-1/2">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0 ">
                    <div class="animLeft ">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-[#69A8A4]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">{{ __('listing/index/main.tag_1') }}</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-[#23334B]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">{{ __('listing/index/main.tag_2') }}</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-[#767E94]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">{{ __('listing/index/main.tag_3') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search -->
    <x-layout.listing.search />
</main>
