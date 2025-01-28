<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title flex space-x-3">
            {{ __('home/client.title') }}
        </h2>
        <button class="primary-button">
            {{ __('home/client.action_1') }}
        </button>
    </div>

    <div class="container pt-6 md:pt-12 xl:pt-24">
        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" uk-grid>
            <div>
                <div class="relative">
                    <img
                        class="w-full"
                        src="{{ asset('assets/images/client_1_bg.png') }}"
                        alt="background"
                    />
                    <div class="border-rounded h-full overflow-hidden absolute w-[90%] left-1/2 top-[-20px] -translate-x-1/2">
                        <img
                            class="hidden absolute left-0 top-0 z-[99]"
                            src="{{ asset('assets/images/client_1.png') }}"
                            alt="client 1"
                        />
                    </div>
                    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white w-[80%]">
                        <h3 class="second-title whitespace-nowrap pb-5">{!! __('home/client.client_name_1') !!}</h3>
                        <p class="text-sm md:text-xl">
                            {{ __('home/client.client_desc_1') }}
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="relative">
                    <img
                        class="w-full"
                        src="{{ asset('assets/images/client_1_bg.png') }}"
                        alt="background"
                    />
                    <div class="border-rounded h-full overflow-hidden absolute w-[90%] left-1/2 top-[-20px] -translate-x-1/2">
                        <img
                            class="hidden absolute left-0 top-0 z-[99]"
                            src="{{ asset('assets/images/client_2.png') }}"
                            alt="client 2"
                        />
                    </div>
                    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white w-[80%]">
                        <h3 class="second-title whitespace-nowrap pb-5">{!! __('home/client.client_name_2') !!}</h3>
                        <p class="text-sm md:text-xl">
                            {{ __('home/client.client_desc_2') }}
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <div class="relative">
                    <img
                        class="w-full"
                        src="{{ asset('assets/images/client_1_bg.png') }}"
                        alt="background"
                    />
                    <div class="border-rounded h-full overflow-hidden absolute w-[90%] left-1/2 top-[-20px] -translate-x-1/2">
                        <img
                            class="hidden absolute left-0 top-[-10px] z-[99] "
                            src="{{ asset('assets/images/client_3.png') }}"
                            alt="client 3"
                        />
                    </div>
                    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white w-[80%]">
                        <h3 class="second-title whitespace-nowrap pb-5">{!! __('home/client.client_name_3') !!}</h3>
                        <p class="text-sm md:text-xl">
                            {{ __('home/client.client_desc_3') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
