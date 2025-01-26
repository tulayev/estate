<section class="section">
    <div class="container">
        <!-- Slider -->
        <div
            class="border-rounded relative px-5 sm:px-10 xl:px-20 py-5 sm:py-10 md:py-20 lg:py-30 xl:py-60"
            style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-100"></div>
            <div class="relative z-10">
                <h2 class="section-title-white text-lg sm:text-2xl xl:text-5xl">
                    {{ __('home/problem.title') }}
                </h2>
                <p class="text-white text-sm lg:text-base xl:text-2xl mt-4 sm:mt-5 lg:mt-10">
                    We transform off-plan real estate sales by showcasing projects based on their true merit and potential,
                    not just an agent’s reputation or glossy brochures.
                </p>
                <div class="flex items-center space-x-4 mt-4 sm:mt-8 lg:mt-10 xl:mt-20">
                    <p class="text-white font-bold text-xs xl:text-xl">How we serve</p>
                    <button class="primary-button text-xs xl:text-lg">Investors</button>
                    <button class="primary-button bg-[#5C687A] text-xs xl:text-lg">developers</button>
                </div>
            </div>
        </div>
        <!-- Cards -->
        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m mt-5 xl:mt-10" uk-grid>
            <div>
                <div class="relative">
                    <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                    <img
                        class="w-full h-full"
                        src="{{ asset('assets/images/primary_bg.png') }}"
                        alt="primary"
                    />
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <h4 class="text-2xl text-white font-bold uppercase">primary</h4>
                    </div>
                </div>
            </div>
            <div>
                <div class="relative">
                    <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                    <img
                        class="w-full h-full"
                        src="{{ asset('assets/images/resale_bg.png') }}"
                        alt="resale"
                    />
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <h4 class="text-2xl text-white font-bold uppercase">resale</h4>
                    </div>
                </div>
            </div>
            <div>
                <div class="relative">
                    <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                    <img
                        class="w-full h-full"
                        src="{{ asset('assets/images/land_bg.png') }}"
                        alt="land"
                    />
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <h4 class="text-2xl text-white font-bold uppercase">land</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
