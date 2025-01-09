<!-- Desktop -->
<div
    class="header-container z-50"
    uk-sticky="animation: uk-animation-slide-top; sel-target: .header; cls-active: uk-navbar-sticky bg-primary; cls-inactive: z-50; top: 200;"
>
    <header
        class="header absolute top-0 left-0 w-full z-50"
        uk-scrollspy="target: .animLeft; cls: animate__animated animate__lightSpeedInLeft; delay: 300;"
    >
        <div class="w-[70vw] mt-5 mx-auto">
            <nav class="uk-flex uk-flex-between uk-flex-middle py-5 xl:py-10">
                <!-- Logo -->
                <div class="animLeft">
                    <a href="{{ route('pages.home.index') }}">
                        <img
                            class="w-[200px] xlWide:w-[260px] uk-animation-fade"
                            src="{{ asset('assets/images/logoicon.svg') }}"
                            alt="Logo"
                        />
                    </a>
                </div>
                <!-- Navbar Links -->
                <div
                    class="uk-navbar-right text-[#fff]"
                    uk-scrollspy="target: .animRight; cls: uk-animation-slide-right; delay: 300;"
                >
                    <ul class="hidden xl:flex uk-flex-middle uppercase text-base xlWide:text-xl" uk-grid>
                        <li class="animRight">
                            <a
                                href="{{ route('pages.listing.index') }}"
                                class="text-2xl font-900 line-animation"
                            >
                                listings
                            </a>
                        </li>
                        <li class="animRight">
                            <a
                                href="{{ route('pages.club.index') }}"
                                class="text-2xl font-900 line-animation"
                            >
                                insider club
                            </a>
                        </li>
                        <li class="animRight">
                            <a
                                href="{{ route('pages.insight.index') }}"
                                class="text-2xl font-900 line-animation"
                            >
                                insights
                            </a>
                        </li>
                        <li class="animRight">
                            <a
                                href="{{ route('pages.about.index') }}"
                                class="text-2xl font-900 line-animation"
                            >
                                about us
                            </a>
                        </li>
                    </ul>
                    <!-- Locale Switcher -->
                    <ul class="animRight ml-10 w-[235px] rounded-[100px] bg-white bg-opacity-10 relative px-5 py-2.5">
                        <li class="text-lg font-900">
                            <a href="#">
                                {{ config()->get('locales')[app()->getLocale()] }}
                            </a>
                            <div
                                class="p-4 rounded-lg min-w-16"
                                uk-dropdown="pos: bottom-justify; animation: uk-animation-slide-top-small; duration: 400; mode: click"
                            >
                                <ul>
                                    @foreach(config()->get('locales') as $k => $v)
                                        @if($k !== app()->getLocale())
                                            <li>
                                                <a
                                                    href="{{ route('change-locale', $k) }}"
                                                    class="text-primary"
                                                >
                                                    {{ ($v) }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</div>
<!-- Mobile -->
