<section class="section">
    <div class="container">
        <h2 class="section-title mb-16">
            {{ __('about/focus.title') }}
        </h2>

        <p class="uk-margin-remove xs:text-lg sm:text-xl lg:text-2xl">
            {{ __('about/focus.off_plan') }}
        </p>

        <h3 class="uk-text-bold uk-text-uppercase mt-10 mb-10 text-xl sm:text-4xl">
            {{ __('about/focus.strategy') }}
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 md:p-4">
            <!-- First Card -->
            <div>
                <div
                    class="h-64 flex items-center justify-center bg-cover bg-center rounded-xl p-8"
                    data-src="{{ asset('assets/images/about/focus-bg-img.png') }}"
                    uk-img
                >
                    <div class="flex flex-col items-center justify-center h-full">
                        <span class="font-bold text-[5rem]">📈</span>
                        <h4 class="font-bold text-white uppercase text-sm sm:text-xl lg:ml-8  lg:leading-none">
                            {{ __('about/focus.card_1') }}
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Second Card -->
            <div>
                <div
                    class="h-64 flex items-center justify-center bg-cover bg-center rounded-xl p-8"
                    data-src="{{ asset('assets/images/about/focus-bg-img.png') }}"
                    uk-img
                >
                    <div class="flex flex-col items-center justify-center h-full">
                        <span class="font-bold text-[5rem]">💵</span>
                        <h4 class="font-bold text-white uppercase text-sm sm:text-xl lg:ml-8  lg:leading-none">
                            {{ __('about/focus.card_2') }}
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Third Card -->
            <div>
                <div
                    class="h-64 flex items-center justify-center bg-cover bg-center rounded-xl p-8"
                    data-src="{{ asset('assets/images/about/focus-bg-img.png') }}"
                    uk-img
                >
                    <div class="flex flex-col items-center justify-center h-full">
                        <span class="font-bold text-[5rem]">⌛️</span>
                        <h4 class="font-bold text-white uppercase text-sm sm:text-xl lg:ml-6  lg:leading-none">
                            {{ __('about/focus.card_3') }}
                        </h4>
                    </div>
                </div>
            </div>

            <!-- Fourth Card -->
            <div>
                <div
                    class="h-64 flex items-center justify-center bg-cover bg-center rounded-xl p-8"
                    data-src="{{ asset('assets/images/about/focus-bg-img.png') }}"
                    uk-img
                >
                    <div class="flex flex-col items-center justify-center h-full">
                        <span class="font-bold text-[5rem]">🗓</span>
                        <h4 class="font-bold text-white uppercase text-sm sm:text-xl lg:ml-6 lg:mb-2 lg:leading-none">
                            {{ __('about/focus.card_4') }}
                        </h4>
                    </div>
                </div>
            </div>


            

        </div>

        <!-- Warning Card -->
        <div
            class="mt-4 p-10 bg-cover bg-center"
            style="background-image: url('{{ asset('assets/images/about/crucial-to-understand-bg.png') }}');"
        >
            <div class="grid grid-cols-1 md:grid-cols-6 gap-8 items-center">
                <!-- Warning Icon -->
                <div class="md:col-span-1 flex items-center justify-center">
                    <span class="text-white text-[8rem] font-bold">&#33;</span>
                </div>

                <!-- Warning Text -->
                <div class="md:col-span-4 sm:col-span-6 xs:col-span-12">
                    <p class="text-white text-shadow uk-text-small@xs uk-text-medium@sm uk-text-large@md uk-margin-left@sm xxs:mb-10 uk-margin-medium-left@md uk-padding-left-small uk-padding-bottom-large text-[16px] xs:text-[18px] sm:text-[20px] md:text-[24px] lg:text-[28px]">
                        {{ __('about/focus.warning') }}
                    </p>
                </div>
                <!-- Empty column for symmetry -->
                <div class="md:col-span-1"></div>
            </div>
        </div>

        <div class="uk-section uk-margin-top">
            <div class="uk-container">
                <p class="uk-text-light xs:text-lg sm:text-xl lg:text-2xl mb-10">
                    {{ __('about/focus.p_1') }}
                </p>
                <p class="uk-text-light xs:text-lg sm:text-xl lg:text-2xl">
                    {{ __('about/focus.p_1') }}
                </p>
            </div>
        </div>
    </div>
</section>
