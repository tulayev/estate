<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title flex space-x-3">
            {{ __('home/client.title') }}
        </h2>
        <button class="primary-button">
            {{ __('home/client.action_1') }}
        </button>
    </div>

    <div class="container">
        <div class="mt-10 uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
            <div>
                <div class="relative bg-cover bg-no-repeat text-white rounded-lg sm:border-rounded h-full"
                     style="background-color: rgb(15 31 61 / var(--tw-bg-opacity, 1))">
                    <div class="rounded-lg sm:border-rounded absolute inset-0"></div>
                    <div class="relative px-2 sm:px-4 xl:px-11 py-2 sm:py-4 xl:py-8">
                        <h4 class="font-bold uppercase text-white text-sm sm:text-lg xl:text-3xl">
                            {!! __('home/client.client_name_1') !!}
                        </h4>
                        <p class="mt-2 xl:mt-4 text-xs sm:text-base lg:text-xl">
                            {{ __('home/client.client_desc_1') }}
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="relative bg-cover bg-no-repeat text-white rounded-lg sm:border-rounded h-full"
                     style="background-color: rgb(15 31 61 / var(--tw-bg-opacity, 1))">
                    <div class="rounded-lg sm:border-rounded absolute inset-0"></div>
                    <div class="relative px-2 sm:px-4 xl:px-11 py-2 sm:py-4 xl:py-8">
                        <h4 class="font-bold uppercase text-white text-sm sm:text-lg xl:text-3xl">
                            {!! __('home/client.client_name_2') !!}
                        </h4>
                        <p class="mt-2 xl:mt-4 text-xs sm:text-base lg:text-xl">
                            {{ __('home/client.client_desc_2') }}
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="relative bg-cover bg-no-repeat text-white rounded-lg sm:border-rounded h-full"
                     style="background-color: rgb(15 31 61 / var(--tw-bg-opacity, 1))">
                    <div class="rounded-lg sm:border-rounded absolute inset-0"></div>
                    <div class="relative px-2 sm:px-4 xl:px-11 py-2 sm:py-4 xl:py-8">
                        <h4 class="font-bold uppercase text-white text-sm sm:text-lg xl:text-3xl">
                            {!! __('home/client.client_name_2') !!}
                        </h4>
                        <p class="mt-2 xl:mt-4 text-xs sm:text-base lg:text-xl">
                            {{ __('home/client.client_desc_2') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
