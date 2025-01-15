<footer>
    <div class="p-5 pt-6 md:pt-12 xl:pt-24">
        <div class="h-[800px] relative">
            <!-- Map -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15807.925736790354!2d98.35639726144633!3d7.897007978309972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x305031c77c20ac4b%3A0xc7e0cd8ec7ed8276!2sMu%20Ban%20Suan%20Place%2C%20Mueang%20Phuket%2C%20Mueang%20Phuket%20District%2C%20Phuket%2083000%2C%20Thailand!5e0!3m2!1sen!2s!4v1735564742957!5m2!1sen!2s"
                width="100%"
                height="100%"
                class="border-0 border-rounded"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
            <!-- Footer Links -->
            <div class="bg-[#0F1F3Ddd] border-rounded absolute left-0 bottom-0 w-full flex flex-col items-center py-2 sm:py-10">
                <nav>
                    <!-- Desktop -->
                    <ul class="uppercase uk-grid-small uk-visible@s" uk-grid>
                        <li class="animLeft">
                            <a
                                href="{{ route('pages.listing.index') }}"
                                class="line-animation text-white font-bold"
                            >
                                listings
                            </a>
                        </li>
                        <li class="animLeft">
                            <a
                                href="{{ route('pages.club.index') }}"
                                class="line-animation text-white font-bold"
                            >
                                insider club
                            </a>
                        </li>
                        <li class="animLeft">
                            <a
                                href="{{ route('pages.insight.index') }}"
                                class="line-animation text-white font-bold"
                            >
                                insight
                            </a>
                        </li>
                        <li class="animLeft">
                            <a
                                href="{{ route('pages.about.index') }}"
                                class="line-animation text-white font-bold"
                            >
                                about us
                            </a>
                        </li>
                    </ul>
                    <!-- Mobile -->
                    <ul class="uppercase text-center uk-grid-small uk-child-width-1-1 uk-hidden@s" uk-grid>
                        <li class="animLeft">
                            <a
                                href="{{ route('pages.listing.index') }}"
                                class="line-animation text-white font-bold"
                            >
                                listings
                            </a>
                        </li>
                        <li class="animLeft">
                            <a
                                href="{{ route('pages.club.index') }}"
                                class="line-animation text-white font-bold"
                            >
                                insider club
                            </a>
                        </li>
                        <li class="animLeft">
                            <a
                                href="{{ route('pages.insight.index') }}"
                                class="line-animation text-white font-bold"
                            >
                                insight
                            </a>
                        </li>
                        <li class="animLeft">
                            <a
                                href="{{ route('pages.about.index') }}"
                                class="line-animation text-white font-bold"
                            >
                                about us
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="mt-4 sm:mt-10">
                    <!-- Desktop -->
                    <div class="flex space-x-4 items-center uk-visible@s">
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
                                            alt="x"
                                        />
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
                        <div>
                            <a
                                href="tel:+7 (972) 928-30-12"
                                class="white-button flex justify-center items-center"
                            >
                                <span>+7 (972) 928-30-12</span>
                            </a>
                        </div>
                    </div>
                    <!-- Mobile -->
                    <div class="uk-grid-small uk-child-width-1-1 px-6 uk-hidden@s" uk-grid>
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
                                            alt="x"
                                        />
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
                        <div>
                            <a
                                href="tel:+7 (972) 928-30-12"
                                class="white-button flex justify-center items-center"
                            >
                                <span>+7 (972) 928-30-12</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
