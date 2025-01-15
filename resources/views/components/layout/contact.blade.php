<section
    id="contactSection"
    class="section"
>
    <div class="container flex items-center justify-between mb-10">
        <h2 class="section-title flex space-x-3">
            contact us
        </h2>
        <div class="flex items-center space-x-4 uk-visible@m">
            <div class="white-button">
                <ul class="flex items-center space-x-8 h-full">
                    <li>
                        <a href="#">
                            <img
                                src="{{ asset('assets/images/icons/whatsapp.svg') }}"
                                alt="whatsapp"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img
                                src="{{ asset('assets/images/icons/x.svg') }}"
                                alt="x" />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img
                                src="{{ asset('assets/images/icons/instagram.svg') }}"
                                alt="instagram"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img
                                src="{{ asset('assets/images/icons/youtube.svg') }}"
                                alt="youtube"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img
                                src="{{ asset('assets/images/icons/facebook.svg') }}"
                                alt="facebook"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img
                                src="{{ asset('assets/images/icons/vk.svg') }}"
                                alt="vk"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
                class="white-button"
            >
                +7 (972) 928-30-12
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
                            <span class="content-name">Enter your name</span>
                        </label>
                    </div>
                </div>
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
                            <span class="content-name">Enter your number</span>
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
                    <span class="content-name">Message</span>
                </label>
            </div>
            <button class="absolute bg-primary text-white border-rounded w-full bottom-0 text-xl font-bold h-[60px] md:h-[80px]">Send</button>
        </form>
    </div>
</section>
