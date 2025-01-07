<div class="py-5 px-5 relative">
    <div class="main-section relative">
        <img class="object-cover h-[400px] sm:h-auto sm:object-contain" src="{{ asset('') }}assets/images/main-background.png" alt="main">

        <x-layout.header />

        <div class="absolute top-1/2 -translate-y-1/2 mini-container left-1/2 -translate-x-1/2">
            <div class="main-wrapper" uk-scrollspy="target: .animLeft; cls: uk-animation-slide-left; delay: 300;">

                <h1 class="main-title animLeft text-2xl xl:text-4xl xlWide:text-6xl">
                    CLARITY FOR INVESTORS. <br />
                    VISIBILITY FOR DEVELOPERS.
                </h1>

                <div class="mt-5 lg:mt-[80px]">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 sm:space-y-0 space-y-3 text-sm xlWide:text-lg font-extrabold uppercase">
                        <div class="text-white animLeft">
                            <a href="#modalForm" uk-toggle
                               class=" inline-flex items-center space-x-2 bg-white/10 text-[#fff] font-600 px-[22px] py-1 lg:py-[12px] rounded-full">
                                <img src="{{ asset('') }}assets/images/play.svg" alt="play" />
                                <span>watch a video</span>
                            </a>
                        </div>
                        <div class="text-white animLeft">
                            <a href="#modalForm" uk-toggle
                               class="inline-block space-x-2 bg-white/10 text-[#fff] font-600 px-[22px] py-1 lg:py-[12px] rounded-full">
                                <span>Contact us</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-layout.search />
</div>
