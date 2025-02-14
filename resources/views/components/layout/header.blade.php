@props([
    'mapView' => false,
])

<!-- Desktop -->
<header
    class="header absolute top-0 left-0 w-full z-[999] uk-visible@m"
    uk-scrollspy="target: .animLeft; cls: animate__animated animate__lightSpeedInLeft; delay: 300;"
    uk-sticky="animation: uk-animation-slide-top; sel-target: .header; cls-active: {{ $mapView ? 'bg-white' : 'bg-primary' }} uk-navbar-sticky; cls-inactive: z-[9999]; top: 200;"
    x-data="listingDropdown()"
>
    <div class="relative">
        <div class="container">
            <nav
                class="flex justify-between items-center pt-10"
                :class="open ? 'pb-24' : 'pb-10'"
            >
                <!-- Logo -->
                <div class="animLeft">
                    <a href="{{ route('pages.home.index') }}">
                        <img
                            class="w-[260px] md:w-[180px] lg:w-[200px] xl:w-[165px] xxl:w-[230px] uk-animation-fade"
                            src="{{ $mapView ? asset('assets/images/icons/logo-primary.svg') : asset('assets/images/icons/logo-white.svg') }}"
                            alt="Logo"
                        />
                    </a>
                </div>
                <!-- Navbar Links -->
                <div
                    class="{{ $mapView ? 'text-primary' : 'text-[#f4f4f4]' }} uk-visible@m uk-navbar-right"
                    uk-scrollspy="target: .animRight; cls: uk-animation-slide-right; delay: 300;"
                >
                    <ul class="flex uk-flex-middle uppercase" uk-grid>
                        <li class="animRight">
                            <a
                                href="{{ route('pages.listing.index') }}"
                                class="line-animation md:text-sm xl:text-base xxl:text-xl xl:font-bold xxl:font-black"
                                @mouseenter="open = true"
                                @mouseleave="open = false"
                            >
                                {{ __('general.nav_listings') }}
                            </a>
                            @if ($types)
                                <div
                                    x-show="open"
                                    @mouseenter="open = true"
                                    @mouseleave="open = false"
                                    x-transition:enter="transition transform ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition transform ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="absolute bg-transparent border-none mt-4 w-full left-0"
                                >
                                    <div class="container flex justify-between space-x-6">
                                        @foreach($types as $type)
                                            <a
                                                href="{{ route('pages.listing.index', ['type' => $type->id]) }}"
                                                class="w-full"
                                            >
                                                <div class="{{ $mapView ? 'text-primary' : 'bg-opacity-10 text-white' }} bg-white text-center text-base border-rounded py-4 md:text-lg xl:text-xl font-bold xl:font-black">
                                                    {{ $type->name }}
                                                </div>
                                            </a>

                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </li>
                        <li class="animRight">
                            <a
                                href="{{ route('pages.club.index') }}"
                                class="line-animation md:text-sm xl:text-base xxl:text-xl xl:font-bold xxl:font-black"
                            >
                                {{ __('general.nav_ic') }}
                            </a>
                        </li>
                        <li class="animRight">
                            <a
                                href="{{ route('pages.insight.index') }}"
                                class="line-animation md:text-sm xl:text-base xxl:text-xl xl:font-bold xxl:font-black"
                            >
                                {!! __('general.nav_insights') !!}
                            </a>
                        </li>
                        <li class="animRight">
                            <a
                                href="{{ route('pages.about.index') }}"
                                class="line-animation md:text-sm xl:text-base xxl:text-xl xl:font-bold xxl:font-black"
                            >
                                {!! __('general.nav_about') !!}
                            </a>
                        </li>
                    </ul>
                    <!-- Locale Switcher -->
                    <ul class="{{ $mapView ? '' : 'bg-opacity-10' }} animRight flex justify-center items-center rounded-[100px] bg-white relative w-[60px] md:ml-4 xl:ml-6 xxl:ml-[72px]">
                        <li class="w-full xxl:w-1/2 flex justify-around md:font-semibold lg:font-bold md:text-sm xl:text-base xxl:text-lg xxl:font-black">
                            <a href="#">
                                {{ config()->get('locales')[app()->getLocale()] }}
                            </a>
                            <div
                                class="rounded-[100px] p-0"
                                uk-dropdown="pos: bottom-justify; animation: uk-animation-slide-top-small; duration: 400; mode: click"
                            >
                                <ul>
                                    @foreach(config()->get('locales') as $k => $v)
                                        @if($k !== app()->getLocale())
                                            <li class="text-center whitespace-nowrap">
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
                            <a href="#" class="hidden">
                                USD
                            </a>
                        </li>
                        <li class="hidden">
                            <img
                                src="{{ asset('assets/images/icons/locale-icon.svg') }}"
                                alt="locale-icon"
                            />
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
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
                        src="{{ asset('assets/images/icons/logo-white.svg') }}"
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
                            <li class="p-0 sm:hidden relative">
                                <form
                                    id="mobileSearch"
                                    action="{{ route('pages.listing.index') }}"
                                    autocomplete="off"
                                    @keydown.enter="$event.target.closest('form').submit()"
                                >
                                    <input
                                        id="name"
                                        type="text"
                                        name="title"
                                        placeholder="Search..."
                                        class="w-full border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-500 py-2 placeholder-secondary"
                                    />
                                    <button
                                        class="absolute top-1 right-1 text-3xl bg-transparent border-none outline-none"
                                        type="button"
                                        uk-toggle="target: #searchModal"
                                    >
                                        +
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

 <script defer>
     function listingDropdown() {
         return {
             open: false
         };
     }
 </script>
