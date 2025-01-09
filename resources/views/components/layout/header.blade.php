 <!-- Desktop -->
<header
    class="header absolute top-0 left-0 w-full z-[999] uk-visible@m"
    uk-scrollspy="target: .animLeft; cls: animate__animated animate__lightSpeedInLeft; delay: 300;"
    uk-sticky="animation: uk-animation-slide-top; sel-target: .header; cls-active: uk-navbar-sticky bg-primary; cls-inactive: z-[999]; top: 200;"
>
    <div class="w-[70vw] mx-auto">
        <nav class="uk-flex uk-flex-between uk-flex-middle py-5 xl:py-10">
            <!-- Logo -->
            <div class="animLeft">
                <a href="{{ route('pages.home.index') }}">
                    <img
                        class="w-[260px] xl:w-[165px] 2xl:w-[260px] uk-animation-fade"
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
                            class="line-animation text-sm md:text-base xl:text-lg xl:font-700 2xl:text-2xl 2xl:font-900"
                        >
                            listings
                        </a>
                    </li>
                    <li class="animRight">
                        <a
                            href="{{ route('pages.club.index') }}"
                            class="line-animation text-sm md:text-base xl:text-lg xl:font-700 2xl:text-2xl 2xl:font-900"
                        >
                            insider club
                        </a>
                    </li>
                    <li class="animRight">
                        <a
                            href="{{ route('pages.insight.index') }}"
                            class="line-animation text-sm md:text-base xl:text-lg xl:font-700 2xl:text-2xl 2xl:font-900"
                        >
                            insights
                        </a>
                    </li>
                    <li class="animRight">
                        <a
                            href="{{ route('pages.about.index') }}"
                            class="line-animation text-sm md:text-base xl:text-lg xl:font-700 2xl:text-2xl 2xl:font-900"
                        >
                            about us
                        </a>
                    </li>
                </ul>
                <!-- Locale Switcher -->
                <ul class="animRight flex justify-between items-center rounded-[100px] bg-white bg-opacity-10 relative xl:w-[150px] xl:ml-6 xl:pl-4 2xl:w-[235px] 2xl:ml-10 2xl:pl-5">
                    <li class="text-base font-700 2xl:text-lg 2xl:font-900">
                        <a href="#">
                            {{ config()->get('locales')[app()->getLocale()] }}
                        </a>
                        <div
                            class="rounded-lg p-2.5 min-w-10 2xl:p-4 2xl:min-w-16"
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
                                                {{ $v }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li>
                        <img
                            src="{{ asset('assets/images/icons/locale-icon.svg') }}"
                            alt="locale-icon"
                        />
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- Mobile -->
<header
    class="header relative bg-primary uk-hidden@m uk-sticky z-[999]"
    uk-scrollspy="target: .animateText; cls: uk-animation-slide-left-small; delay: 300"
    uk-sticky="animation: uk-animation-slide-top; sel-target: .header; cls-active: uk-navbar-sticky1; cls-inactive: z-[999]; top: 200;"
>
    <div class="uk-container uk-container-large">
        <nav class="uk-navbar" uk-navbar>
            <!-- Logo -->
            <div class="uk-navbar-left">
                <a
                    class="uk-navbar-item uk-logo animateText uk-padding-remove uk-scrollspy-inview"
                    href="{{ route('pages.home.index') }}"
                >
                    <img
                        class="w-[260px] uk-animation-fade"
                        src="{{ asset('assets/images/logoicon.svg') }}"
                        alt="Logo"
                    />
                </a>
                <hr class="border-none outline-none w-[2px] h-[50px] mx-2 lg:mx-4 xl:mx-16 bg-[#11111109] uk-visible@m">
            </div>
            <!-- Burger Menu -->
            <div class="uk-navbar-right">
                <a
                    href="#"
                    aria-expanded="false"
                    class="uk-navbar-toggle animateText uk-icon uk-navbar-toggle-icon uk-scrollspy-inview"
                    uk-toggle="target: #burgerMenu"
                    uk-navbar-toggle-icon
                ></a>
                <div
                    id="burgerMenu"
                    uk-offcanvas="flip: true"
                    class="uk-offcanvas"
                >
                    <div class="uk-offcanvas-bar bg-primary">
                        <button
                            class="uk-offcanvas-close uk-icon uk-close"
                            type="button"
                            uk-close
                        ></button>

                        <ul class="uk-nav uk-nav-default uk-grid uk-flex-column uk-flex-middle">
                            <li>
                                <a
                                    href="{{ route('pages.listing.index') }}"
                                    class="nav-link-offcanvas"
                                >
                                    Listings
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('pages.club.index') }}"
                                    class="nav-link-offcanvas"
                                >
                                    Insider Club
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('pages.insight.index') }}"
                                    class="nav-link-offcanvas"
                                >
                                    Insights
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('pages.about.index') }}"
                                    class="nav-link-offcanvas"
                                >
                                    About us
                                </a>
                            </li>
                            <li>
                                <ul class="uk-nav-default uk-nav-parent-icon uk-nav" uk-nav>
                                    <li class="uk-parent uk-active">
                                        <a href="#">
                                            {{ config()->get('locales')[app()->getLocale()] }}
                                        </a>
                                        <ul class="uk-nav-sub" hidden>
                                            @foreach(config()->get('locales') as $k => $v)
                                                @if($k !== app()->getLocale())
                                                    <li>
                                                        <a href="{{ route('change-locale', $k) }}">
                                                            {{ $v }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
