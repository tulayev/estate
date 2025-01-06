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

    <div class="hidden absolute left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 text-[#C6C6C6] z-[99] bg-white font-600 uppercase rounded-full sm:flex items-center px-3 w-[90vw] lg:w-[70vw] h-[50px] xl:h-[70px] text-sm xl:text-base xlWide:text-xl">
        <div>
            <img width="40" src="{{ asset('') }}assets/images/circle.png" alt="circle" />
        </div>
        <div class="pr-5 border-r border-borderColor h-full flex items-center justify-center w-[18%]">
            <p>keywords</p>
        </div>
        <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[15%]">
            <p>type</p>
        </div>
        <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[20%]">
            <p>location</p>
        </div>
        <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[8%]">
            🛏️
        </div>
        <div class="px-10 border-r border-borderColor h-full flex items-center justify-center w-[24%]">
            <p>price</p>
        </div>
        <div class="h-full flex items-center justify-end w-[10%] space-x-5">
            <p class="text-3xl">+</p>
            <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px]">
                <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px] bg-[#0F1F3D] rounded-full flex items-center justify-center">
                    <img class="w-[14px] xl:w-[20px]" src="{{ asset('') }}assets/images/search.svg" alt="search">
                </div>
            </div>
        </div>
    </div>
</div>
