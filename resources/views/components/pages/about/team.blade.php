<section class="section">
    <div class="container">
        <div class="uk-flex uk-flex-middle uk-flex-between uk-flex-wrap">
            <h2 class="section-title mb-5 xl:mb-10">
                {{ __('about/team.title') }}
            </h2>
            <a
                href="#contactSection"
                class="primary-button"
            >
                {{ __('about/team.contact_us') }}
            </a>
        </div>

        <div class="mt-5">
            <div class="uk-card uk-card-default border-rounded uk-padding-large">
                <div class="uk-grid-large" uk-grid>
                    <!-- Left Section: Image -->
                    <div class="uk-width-1-3@m uk-flex uk-flex-center uk-flex-middle">
                        <img
                            src="{{ asset('assets/images/about/ceo-role.png') }}"
                            alt="Pavel Ignatev"
                            class="rounded-full sm:w-1/5 md:w-2/5 lg:w-3/5 xl:w-4/5"
                        />
                    </div>
                    <!-- Right Section: Content -->
                    <div class="uk-width-2-3@m">
                        <div class="flex justify-between items-start">
                            <h3 class="uppercase font-bold text-lg sm:text-xl lg:text-2xl xl:text-[30px]">
                                {{ __('about/team.team_member1') }}
                            </h3>
                            <span class="text-gray-500 bg-gray-100 px-2 py-1 rounded-full">CEO</span>
                        </div>
                        <!-- Description -->
                        <p class="text-sm sm:text-base md:text-lg mt-4 lg:mt-6">
                            {{ __('about/team.member_experience1') }}
                        </p>
                        <!-- Buttons Section -->
                        <div class="flex flex-col items-start justify-start gap-4 mt-8 xlWide:flex-row">
                            <!-- Email Button -->
                            <a
                                href="mailto:#"
                                class="flex items-center px-4 py-2 rounded-full bg-gray-100 hover:bg-opacity-90 transition"
                            >
                                <img
                                    src="{{ asset('assets/images/about/icons/mail.svg') }}"
                                    alt="mail"
                                    class="w-[30px] mr-2"
                                />
                                <span class="font-bold xxs:text-sm sm:text-lg md:text-lg">adress@gmail.com</span
                                >
                            </a>

                            <!-- Facebook Button -->
                            <a
                                href="#"
                                class="flex items-center px-4 py-2 rounded-full bg-gray-100 bg-opacity-90 hover:bg-opacity-90 transition"
                            >
                                <img
                                    src="{{ asset('assets/images/about/icons/facebook.svg') }}"
                                    alt="facebook"
                                    class="w-[25px] mr-2"
                                />
                                <span class="font-bold xxs:text-sm sm:text-lg md:text-xl lg:text-xl">Istategroup</span
                                >
                            </a>

                            <!-- WhatsApp Button -->
                            <a
                                href="#"
                                class="flex items-center px-4 py-2 rounded-full bg-gray-100 bg-opacity-90 hover:bg-opacity-90 transition"
                            >
                                <img
                                    src="{{ asset('assets/images/about/icons/whatsapp.svg') }}"
                                    alt="whatsapp"
                                    class="w-[25px] mr-2"
                                />
                                <span
                                    class="font-bold xxs:text-sm sm:text-lg md:text-lg lg:text-lg">Istategroup</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="uk-card-body uk-background-default">
                    <h4 class="uk-text-bold mb-4">
                        {{ __('about/team.member_bio') }}
                    </h4>
                    <div x-data="{ show: false }">
                        <p x-show="show" class="uk-text-light mt-4">
                            {{ __('about/team.member_desc1') }}
                        </p>
                        <p x-show="show" class="uk-text-light mt-10">
                             {{ __('about/team.member_desc2') }}
                        </p>
                        <div class="uk-text-center uk-margin-top">
                            <button @click="show = !show" class="border-none uk-button uk-button-default uk-text-uppercase uk-text-bold">
                           <span x-show="!show">{{ __('about/team.action_btn_pre') }}</span>
                           <span x-show="show">{{ __('about/team.action_btn_post') }}</span>
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
