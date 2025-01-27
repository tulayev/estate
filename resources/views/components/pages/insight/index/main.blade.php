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
                    the main topic
                </h1>
                <span class="text-white  text-lg animLeft  ml-2 p-2 lg:mt-10">
                    1h
                </span>
            </div>

            <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                <div class="pl-2 text-white">
                    Buying a property with the intent to sell it later—whether in the short or long term—requires strategic planning<br>
                    and market insight. At <strong>Ignatev Estate</strong>, we specialize in identifying properties that are not only great investments<br>
                    now but will also be in demand when you're ready to sell. Here’s how to ensure the property you buy today is <br>
                    something you’ll be able to sell tomorrow, for profit or convenience.
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
