<main class="main-section relative p-2 overflow-scroll">
    <img
        class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
        src="{{ asset('assets/images/about/about-main-bg.png') }}"
        alt="main"
    />
    <div class="container absolute-centralize">
        <div
            class="main-wrapper"
            uk-scrollspy="target: .animLeft; cls: uk-animation-slide-left; delay: 300;"
        >
            <h1 class="main-title animLeft mt-2 lg:mt-10">
                {{ __('about/main.title') }}
            </h1>

            <div class="animLeft hidden sm:flex text-sm lg:text-lg mt-2 lg:mt-10">
                <div class="border-2 border-gray-700"></div>
                <div class="pl-2 text-white">
                    Buying a property with the intent to sell it later—whether in the short or long term—<br>
                    requires strategic planning and market insight. At <strong>Ignatev Estate</strong>, we specialize in<br>
                    identifying properties that are not only great investments now but will also be in<br>
                    demand when you're ready to sell.
                </div>
            </div>

            <div class=" lg:mt-20 m-2">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0">
                    <div class="animLeft">
                        <a
                            href="#"
                            class="main-button-about"
                        >
                            <img
                                src="{{ asset('assets/images/icons/phone-green.svg') }}"
                                alt="play"
                                width="53"
                                height="53"
                            />
                            <span class="pr-2 overflow-hidden whitespace-nowrap text-ellipsis"> +7 (972) 928-30-12</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#"
                            class="main-button-about"
                        >
                            <img
                                src="{{ asset('assets/images/icons/facebook-white.svg') }}"
                                alt="Facebook"
                                width="53"
                                height="53"
                            />
                            <span class="pr-2 overflow-hidden whitespace-nowrap text-ellipsis">Istategroup</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#"
                            class="main-button-about"
                        >
                            <img
                                src="{{ asset('assets/images/icons/whatsapp-green.svg') }}"
                                alt="Whatsapp"

                            />
                            <span class="pr-2 overflow-hidden whitespace-nowrap text-ellipsis">Istategroup</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
