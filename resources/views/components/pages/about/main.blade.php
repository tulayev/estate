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
                
                <div class="pl-2 text-white">
                    {!! __('about/main.description') !!}
                </div>
            </div>

            <div class="mt-5 lg:mt-20">
                <div class="inline-flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0">
                    <div class="animLeft" uk-lightbox>
                        <a
                            href="https://www.youtube.com/watch?v=wLx_Ag4vm_U"
                            class="main-button"
                            data-attrs="width: 1280; height: 720;"
                        >
                            <img
                                src="{{ asset('assets/images/icons/play.svg') }}"
                                alt="play"
                            />
                            <span>{{ __('home/main.action_1') }}</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="#contactSection"
                            class="main-button"
                        >
                            <span>{{ __('home/main.action_2') }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="hidden lg:mt-20 m-2">
                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0">
                    <div class="animLeft">
                        <a
                            href="#"
                            class="secondary-button"
                        >
                            <img
                                src="{{ asset('assets/images/icons/phone-green.svg') }}"
                                alt="play"
                                width="53"
                                height="53"
                            />
                            <span class="pr-2 overflow-hidden whitespace-nowrap text-ellipsis normal-case"> +66 (92) 240 7355</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="https://www.facebook.com/istategroup" target="_blank"
                            class="secondary-button"
                        >
                            <img
                                src="{{ asset('assets/images/icons/facebook-about.svg') }}"
                                alt="Facebook"
                                width="53"
                                height="53"
                            />
                            <span class="pr-2 overflow-hidden whitespace-nowrap text-ellipsis normal-case">Istategroup</span>
                        </a>
                    </div>
                    <div class="animLeft">
                        <a
                            href="https://wa.me/66922407355" target="_blank"
                            class="secondary-button"
                        >
                            <img
                                src="{{ asset('assets/images/icons/whatsapp-green.svg') }}"
                                alt="Whatsapp"

                            />
                            <span class="pr-2 overflow-hidden whitespace-nowrap text-ellipsis normal-case">Istategroup</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
