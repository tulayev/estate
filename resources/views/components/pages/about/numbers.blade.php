<section class="section">
    <div class="container">
        <h2 class="section-title mb-16">
           {{ __('about/numbers.title') }}
        </h2>
        <div class="uk-flex uk-flex-column uk-flex-middle">
            <!-- Card 1 -->
            <div class="border-rounded uk-card uk-card-default uk-card-body uk-margin">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-8">
                    <!-- Left Section -->
                    <div class="col-span-1 flex justify-center sm:justify-start text-center items-center">
                        <h3 class="text-primary uk-text-bold uk-heading-large uk-margin-remove text-[96px] xs:text-[120px] sm:text-[60px]">
                            2017
                        </h3>
                    </div>
                    <!-- Right Section -->
                    <div class="col-span-1 sm:col-span-3">
                        <p class="text-base xs:text-lg sm:text-xl lg:text-2xl mt-4 sm:mt-0">
                            {{ __('about/numbers.2017_desc') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="uk-card uk-card-default uk-card-body uk-margin border-rounded">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-8">
                    <!-- Left Section -->
                    <div class="col-span-1 flex justify-center sm:justify-start text-center items-center">
                        <h3 class="text-primary uk-text-bold uk-heading-large uk-margin-remove text-[96px] xs:text-[120px] sm:text-[60px]">
                            2023
                        </h3>
                    </div>
                    <!-- Right Section -->
                    <div class="col-span-1 sm:col-span-3">
                        <p
                            class="text-base xs:text-lg sm:text-xl lg:text-2xl mt-4 sm:mt-0"
                        >
                            {{ __('about/numbers.2023_desc') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Summary Section -->
            <div class="uk-margin">
                <p class="mb-10 text-base xs:text-lg sm:text-xl lg:text-2xl">
                   {{ __('about/numbers.summary_1') }}
                </p>
                <p class="uk-margin-auto text-base xs:text-lg sm:text-xl lg:text-2xl">
                    {{ __('about/numbers.summary_2') }}
                </p>
            </div>
        </div>
    </div>
</section>
