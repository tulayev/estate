<main class="main-section relative p-2 ">
    <img
        class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
        src="{{ asset('assets/images/club/main-bg.png') }}"
        alt="main"
    />
    <div class="container absolute-centralize ">
        <div
            class="main-wrapper "
            uk-scrollspy="target: .animLeft; cls: uk-animation-slide-left; delay: 300;"
        >
            <div class="flex flex-row items-left mt-2 lg:mt-10 ">
                <h1 class="main-title animLeft  ">
                    insider club
                </h1>
                
                <div class="inline-flex flex-row sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0 ml-2">
                    <div class="animLeft">
                        <a
                            href="#"
                            class="main-button"
                        >
                            <img
                                src="{{ asset('assets/images/icons/play.svg') }}"
                                alt="play"
                            />
                            <span>Watch a video</span>
                        </a>
                    </div>
                    
                </div>
            </div>
            </div>

            <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                <div class="pl-2 text-white ">
                    Are you ready to be part of something extraordinary?<br>
                    Welcome to the Insider’s Club, where the future of Phuket’s real estate isn’t just forecasted — it’s shaped.
                </div>
            </div>

            <div class="m-2 w-2/3 md:w-1/2">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0 ">
                    <div class="animLeft ">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-white/10"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis"> Clear</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-white/10"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">Reliable</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-white/10"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">Exclusive</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search -->
    <x-layout.insight.search />
</main>
