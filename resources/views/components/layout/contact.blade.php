<section
    id="contactSection"
    class="section"
>
    <div class="container flex items-center justify-between mb-10">
        <h2 class="section-title flex space-x-3">
            {{ __('general.contact_us') }}
        </h2>
        <div class="flex items-center space-x-4 uk-visible@m">
            <div class="white-button">
                <ul class="flex items-center space-x-8 h-full">
                    <li>
                        <a href="https://wa.me/66922407355">
                            <img
                                src="{{ asset('assets/images/icons/whatsapp.svg') }}"
                                alt="whatsapp"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/ignatev-estate" target="_blank">
                            <img
                                src="{{ asset('assets/images/icons/linkedin.svg') }}"
                                alt="linkedin" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ignatev_estate" target="_blank">
                            <img
                                src="{{ asset('assets/images/icons/instagram.svg') }}"
                                alt="instagram"
                            />
                        </a>
                    </li>

                    <li>
                        <a href="https://www.facebook.com/share/1EHwWjnqSo" target="_blank">
                            <img
                                src="{{ asset('assets/images/icons/facebook.svg') }}"
                                alt="facebook"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="https://t.me/ignatevestate" target="_blank">
                            <img
                                src="{{ asset('assets/images/icons/telegram.svg') }}"
                                alt="telegram"
                            />
                        </a>
                    </li>

                    <li>
                        <a href="mailto:info@ignatev-estate.com">
                            <img
                                src="{{ asset('assets/images/icons/mail.svg') }}"
                                alt="mail"
                            />
                        </a>
                    </li>
                </ul>
            </div>
            <a
                href="tel:+7 (972) 928-30-12"
                class="white-button flex"
            >
                <img
                    src="{{ asset('assets/images/icons/phone.svg') }}"
                    alt="Phone"
                />
                <span>+66 (92) 240 7355</span>
            </a>
        </div>
    </div>

    <div class="container">
        <form class="mt-4 sm:mt-6 md:mt-8 lg:mt-10 w-full relative z-[4]">
            <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
                <div>
                    <div class="form-input-anim">
                        <input
                            type="text"
                            name="text"
                            class="input w-full px-[30px] border-rounded focus:outline-none"
                            autocomplete="off"
                            required
                        />
                        <label for="text" class="label-name">
                            <span class="content-name">{{ __('general.form_name') }}</span>
                        </label>
                    </div>
                </div>
                <div>
                    <div class="form-input-anim">
                        <input
                            type="email"
                            name="email"
                            class="input w-full px-[30px] border-rounded focus:outline-none"
                            autocomplete="off"
                            required
                        />
                        <label for="text" class="label-name">
                            <span class="content-name">{{ __('general.form_email') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-input-anim mt-4 textarea-wrapper">
                <textarea
                    class="input textarea w-full px-[30px] border-rounded focus:outline-none"
                    name="text"
                    rows="12"
                    autocomplete="off"
                    required
                ></textarea>
                <label for="text" class="label-name">
                    <span class="content-name">{{ __('general.form_message') }}</span>
                </label>
            </div>
            <button class="absolute bg-primary text-white border-rounded w-full bottom-0 text-xl font-bold h-[60px] md:h-[80px] uppercase">
                {{ __('general.form_submit') }}
            </button>
        </form>
    </div>
</section>
