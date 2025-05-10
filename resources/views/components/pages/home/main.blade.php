<main class="main-section relative">
    <img
        class="main-section-image"
        src="{{ asset('assets/images/main-background.png') }}"
        alt="main"
    />
    <div class="px-10 container absolute-centralize">
        <div
            class="main-wrapper"
            uk-scrollspy="target: .animLeft; cls: uk-animation-slide-left; delay: 300;"
        >
            <h1 class="main-title animLeft">
                {!! __('home/main.title') !!}
            </h1>
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
        </div>
    </div>
    <!-- Search -->
    <x-layout.listing.search />
</main>
