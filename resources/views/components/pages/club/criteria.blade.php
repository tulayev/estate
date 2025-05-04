<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            {{ __('club/criteria.title') }}
        </h2>
        <button class="primary-button" onclick="document.getElementById('contactSection').scrollIntoView({behavior: 'smooth'})">
            {{ __('club/criteria.action_1') }}
        </button>
    </div>

    <div class="container pt-6 md:pt-12 xl:pt-24">
        <div class="w-full">
           <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: false">
                <li class="uk-parent">
                    <a href="#">
                        <img
                            class="w-[14px] sm:w-[34px]"
                            src="{{ asset('assets/images/icons/plan.svg') }}"
                            alt="icon"
                        />
                        <span class="sm:ml-[12px] collapse-title">
                            {!! __('home/value.ul_item_name_1') !!}
                        </span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/value.ul_item_name_1_desc') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <img
                            class="w-[14px] sm:w-[34px]"
                            src="{{ asset('assets/images/icons/personalized.svg') }}"
                            alt="icon"
                        />
                        <span class="sm:ml-[12px] collapse-title">
                            {!! __('home/value.ul_item_name_2') !!}
                        </span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/value.ul_item_name_2_desc') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <img
                            class="w-[14px] sm:w-[34px]"
                            src="{{ asset('assets/images/icons/sale.svg') }}"
                            alt="icon"
                        />
                        <span class="sm:ml-[12px] collapse-title">
                            {!! __('home/value.ul_item_name_3') !!}
                        </span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/value.ul_item_name_3_desc') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <img
                            class="w-[14px] sm:w-[34px]"
                            src="{{ asset('assets/images/icons/insider.svg') }}"
                            alt="icon"
                        />
                        <span class="sm:ml-[12px] collapse-title">
                            {!! __('home/value.ul_item_name_4') !!}
                        </span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/value.ul_item_name_4_desc') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <img
                            class="w-[14px] sm:w-[34px]"
                            src="{{ asset('assets/images/icons/helping.svg') }}"
                            alt="icon"
                        />
                        <span class="sm:ml-[12px] collapse-title">
                            {!! __('home/value.ul_item_name_5') !!}
                        </span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/value.ul_item_name_5_desc') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>

                <li class="uk-parent">
                    <a href="#">
                        <img
                            class="w-[14px] sm:w-[34px]"
                            src="{{ asset('assets/images/icons/target.svg') }}"
                            alt="icon"
                        />
                        <span class="sm:ml-[12px] collapse-title">
                            {!! __('home/value.ul_item_name_6') !!}
                        </span>
                    </a>
                    <ul class="uk-nav-sub">
                        <li>
                            <p class="text-sm sm:text-xl py-2 sm:py-4">
                                {!! __('home/value.ul_item_name_6_desc') !!}
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>
            </ul>
        </div>
    </div>
</section>
