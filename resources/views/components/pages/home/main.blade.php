<div class="py-5 px-5 relative">
    <div class="main-section relative">
        <img
            class="rounded-[25px] object-cover h-[250px] sm:h-auto sm:object-contain"
            src="{{ asset('assets/images/main-background.png') }}"
            alt="main"
        />
        <div class="absolute top-1/2 -translate-y-1/2 mini-container left-1/2 -translate-x-1/2">
            <div class="main-wrapper" uk-scrollspy="target: .animLeft; cls: uk-animation-slide-left; delay: 300;">
                <h1 class="main-title animLeft text-lg sm:text-xl md:text-2xl lg:text-4xl xl:text-5xl xlWide:text-6xl">
                    CLARITY FOR INVESTORS. <br />
                    VISIBILITY FOR DEVELOPERS.
                </h1>
                <div class="mt-5 lg:mt-[80px]">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 sm:space-y-0 space-y-3 text-sm xlWide:text-lg font-800 uppercase">
                        <div class="text-white animLeft">
                            <a
                                href="#modalForm"
                                class=" inline-flex items-center space-x-2 bg-white/10 text-[#fff] font-600 px-[22px] py-1 lg:py-[12px] rounded-full"
                                uk-toggle
                            >
                                <img
                                    src="{{ asset('assets/images/icons/play.svg') }}"
                                    alt="play"
                                />
                                <span>Watch a video</span>
                            </a>
                        </div>
                        <div class="text-white animLeft">
                            <a
                                href="#contactSection"
                                class="inline-block space-x-2 bg-white/10 text-[#fff] font-600 px-[22px] py-1 lg:py-[12px] rounded-full"
                                uk-toggle
                            >
                                <span>Contact us</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search -->
    <x-layout.search />
</div>
