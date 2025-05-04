<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            {{ __('home/faq.title') }}
        </h2>
        <button class="primary-button" onclick="document.getElementById('contactSection').scrollIntoView({behavior: 'smooth'})">
            {{ __('home/faq.action_1') }}
        </button>
    </div>

    <div class="container pt-6 md:pt-12 xl:pt-24">
        <div class="w-full">
            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: false">
                <li class="uk-parent">
                    <a href="#">
                        <span class="text-primary uppercase text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">{!!__('home/faq.question_1') !!}</span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/faq.answer_1') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <span class="text-primary uppercase text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">{{ __('home/faq.question_2') }}</span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/faq.answer_2') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <span class="text-primary uppercase text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">{!! __('home/faq.question_3') !!}</span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/faq.answer_3') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <span class="text-primary uppercase text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">{!! __('home/faq.question_4') !!}</span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/faq.answer_4') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <span class="text-primary uppercase text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">{!! __('home/faq.question_5') !!}</span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/faq.answer_5') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <span class="text-primary uppercase text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">{!! __('home/faq.question_6') !!}</span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/faq.answer_6') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <span class="text-primary uppercase text-xs sm:text-sm md:text-lg xl:text-xl sm:font-bold xl:font-black">{!! __('home/faq.question_7') !!}</span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/faq.answer_7') !!}
                            </p>
                        </li>
                    </ul>
                </li>

                <li class="uk-nav-divider"></li>
            </ul>
        </div>
    </div>
</section>
