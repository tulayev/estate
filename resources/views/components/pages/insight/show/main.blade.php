<main class="main-section relative p-2 ">
    <img
        class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
        src="{{ asset('assets/images/insights/index/main-bg.png') }}"
        alt="main"
    />
    <div class="container absolute-centralize ">
        <div
            class="main-wrapper "
            uk-scrollspy="target: .animLeft; cls: uk-animation-slide-left; delay: 300;"
        >
            <div class="flex flex-row items-left justify-between">
                <h1 class="main-title animLeft mt-2 lg:mt-10 ">
                    the main topic
                </h1>
                <div class="flex flex-row items-center md:items-right space-x-2 text-white text-sm animLeft ml-2 md:p-2 md:mt-10">
                    <div class="border-rounded bg-white/10 text-white p-2">3 mins read</div>
                    <div class="border-rounded bg-white/10 text-white p-2">👁 590</div>
                </div>
                
            </div>

            <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                <div class="pl-2 text-white">
                    Buying a property with the intent to sell it later—whether in the short or long term—requires strategic planning<br>
                    and market insight. At <strong>Ignatev Estate</strong>, we specialize in identifying properties that are not only great investments<br>
                    now but will also be in demand when you're ready to sell. Here’s how to ensure the property you buy today is <br>
                    something you’ll be able to sell tomorrow, for profit or convenience.
                </div>
            </div>

            <div class="m-2 w-2/3 md:w-1/2">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0 ">
                    <div class="animLeft ">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-[#69A8A4]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis"> research</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-[#23334B]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">Luxury</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#modalForm"
                            class="main-button-about bg-[#767E94]"
                        >
                            <span class="p-2 overflow-hidden whitespace-nowrap text-ellipsis">summer</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search -->
    <x-layout.insight.search />
</main>
