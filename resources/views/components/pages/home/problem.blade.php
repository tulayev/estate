<div class="uk-section mt-10 sm:mt-20 md:mt-25 lg:mt-30 xl:mt-40">
    <div class="mini-container">
        <!-- Slider -->
        <div
            class="rounded-[25px] relative px-5 sm:px-10 xl:px-20 py-5 sm:py-10 md:py-20 lg:py-30 xl:py-60"
            style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
        >
            <div class="absolute rounded-[25px] inset-0 bg-gradient"></div>
            <div class="relative z-10">
                <h2 class="section-title-white text-lg sm:text-2xl xlWide:text-5xl">The Problem We Solve</h2>
                <p class="text-white text-sm xl:text-base xlWide:text-2xl mt-4 sm:mt-5 lg:mt-10">
                    We transform off-plan real estate sales by showcasing projects based on their true merit and potential,
                    not just an agent’s reputation or glossy brochures. 
                </p>
                <div class="flex items-center mt-4 sm:mt-8 xl:mt-10 xlWide:mt-20 space-x-4">
                    <p class="text-white font-700 text-xs xlWide:text-xl">How we serve</p>
                    <button class="primary-button text-xs xlWide:text-lg">Investors</button>
                    <button class="primary-button bg-[#5C687A] text-xs xlWide:text-lg">developers</button>
                </div>
            </div>
        </div>
        <!-- Cards -->
        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m mt-5 xl:mt-10" uk-grid>
            <div>
                <div class="card-mini">
                    <img
                        class="w-full h-full"
                        src="{{ asset('assets/images/primary_bg.png') }}"
                        alt="primary"
                    />
                    <div class="text-wrapper">
                        <h4 class="text-3xl xlWide:text-5xl text-white font-bold uppercase">primary</h4>
                    </div>
                </div>
            </div>
            <div>
                <div class="card-mini">
                    <img
                        class="w-full h-full"
                        src="{{ asset('assets/images/resale_bg.png') }}"
                        alt="resale"
                    />
                    <div class="text-wrapper">
                        <h4 class="text-3xl xlWide:text-5xl text-white font-bold uppercase">resale</h4>
                    </div>
                </div>
            </div>
            <div>
                <div class="card-mini">
                    <img
                        class="w-full h-full"
                        src="{{ asset('assets/images/land_bg.png') }}"
                        alt="land"
                    />
                    <div class="text-wrapper">
                        <h4 class="text-3xl xlWide:text-5xl text-white font-bold uppercase">land</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
