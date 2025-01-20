<main class="main-section relative">
    <img
        class="border-rounded object-cover h-[250px] sm:h-auto sm:object-contain"
        src="{{ asset('assets/images/main-background.png') }}"
        alt="main"
    />
    <div class="container absolute-centralize">
        <div
            class="main-wrapper"
            uk-scrollspy="target: .animLeft; cls: uk-animation-slide-left; delay: 300;"
        >
            <h1 class="main-title animLeft">
                CLARITY FOR INVESTORS. <br />
                VISIBILITY FOR DEVELOPERS.
            </h1>
            <div class="mt-5 lg:mt-20">
                <div class="inline-flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0">
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
                    <div class="animLeft">
                        <a
                            href="#contactSection"
                            class="main-button"
                        >
                            <span>Contact us</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search -->
    <x-layout.listing.search />
</main>
