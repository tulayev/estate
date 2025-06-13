@php($isWhiteHeader = count(request()->segments()) === 2 && !str_contains(request()->fullUrl(), 'insights'))
@php($isNothingFoundPage = View::hasSection('nothing-found-page'))
@php($currentCurrency = Helper::getClientCurrency(session()->get('countryCode')))
<!-- Desktop -->
<header
    class="header absolute top-4 left-0 w-full z-[999] uk-visible@m"
    uk-sticky="sel-target: .header; cls-active: {{ $isWhiteHeader ? 'bg-white' : ($isNothingFoundPage ? 'nothing-found-bg' : 'bg-primary') }} uk-navbar-sticky; cls-inactive: z-[999]; top: 200;"
    x-data="listingDropdown()"
>
    <div class="relative">
        <div class="container">
            <nav
                class="navbar flex justify-between items-center pt-12"
                :class="open ? 'pb-24' : 'pb-12'"
            >
                <!-- Logo -->
                <div class="animLeft">
                    <a href="{{ route('pages.home.index') }}">
                        <img
                            class="w-[260px] md:w-[140px] lg:w-[200px] xl:w-[165px] xxl:w-[230px] uk-animation-fade"
                            src="{{ $isWhiteHeader ? asset('assets/images/icons/logo-primary.svg') : asset('assets/images/icons/logo-white.svg') }}"
                            alt="Logo"
                        />
                    </a>
                </div>
                <!-- Navbar Links -->
                <div
                    class="{{ $isWhiteHeader ? 'text-primary' : 'text-[#f4f4f4]' }} uk-visible@m uk-navbar-right"
                    uk-scrollspy="target: .navbar; cls: uk-animation-slide-right; delay: 300;"
                >
                    <ul class="flex items-center uppercase" uk-grid>
                        <li>
                            <a
                                href="{{ route('pages.listing.index') }}"
                                class="md:text-sm xl:text-base xxl:text-xl font-black"
                                @mouseenter="open = true"
                                @mouseleave="open = false"
                            >
                                {{ __('general.nav_listings') }}
                            </a>
                            @if ($primary && $resales && $land && $rent)
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
                                    class="absolute bg-transparent border-none mt-6 w-full left-0"
                                >
                                    <div class="container flex justify-between space-x-6">
                                        <a
                                            href="{{ route('pages.listing.index', ['type' => $primary->id]) }}"
                                            class="w-full"
                                        >
                                            <div class="{{ $isWhiteHeader || $isNothingFoundPage ? 'text-primary' : 'bg-opacity-10 text-white' }} bg-white text-center text-base border-rounded py-4 md:text-lg xl:text-xl font-bold xl:font-black">
                                                {{ $primary->name }}
                                            </div>
                                        </a>
                                        <a
                                            href="{{ route('pages.listing.index', ['type' => $resales->id]) }}"
                                            class="w-full"
                                        >
                                            <div class="{{ $isWhiteHeader || $isNothingFoundPage ? 'text-primary' : 'bg-opacity-10 text-white' }} bg-white text-center text-base border-rounded py-4 md:text-lg xl:text-xl font-bold xl:font-black">
                                                {{ $resales->name }}
                                            </div>
                                        </a>
                                        <a
                                            href="{{ route('pages.listing.index', ['type' => $rent->id]) }}"
                                            class="w-full"
                                        >
                                            <div class="{{ $isWhiteHeader || $isNothingFoundPage ? 'text-primary' : 'bg-opacity-10 text-white' }} bg-white text-center text-base border-rounded py-4 md:text-lg xl:text-xl font-bold xl:font-black">
                                                {{ $rent->name }}
                                            </div>
                                        </a>
                                        <a
                                            href="{{ route('pages.listing.index', ['tag' => $land->id]) }}"
                                            class="w-full"
                                        >
                                            <div class="{{ $isWhiteHeader || $isNothingFoundPage ? 'text-primary' : 'bg-opacity-10 text-white' }} bg-white text-center text-base border-rounded py-4 md:text-lg xl:text-xl font-bold xl:font-black">
                                                {{ $land->name }}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </li>
                        <li>
                            <a
                                href="{{ route('pages.club.index') }}"
                                class="md:text-sm xl:text-base xxl:text-xl font-black"
                            >
                                {{ __('general.nav_ic') }}
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('pages.insight.index') }}"
                                class="md:text-sm xl:text-base xxl:text-xl font-black"
                            >
                                {{ __('general.nav_insights') }}
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('pages.about.index') }}"
                                class="md:text-sm xl:text-base xxl:text-xl font-black"
                            >
                                {{ __('general.nav_about') }}
                            </a>
                        </li>
                        <!-- Locale & Currency Switcher -->
                        <li>
                            <ul class="bg-opacity-10 border-rounded bg-white relative md:w-[100px] lg:w-[130px] xxl:w-[170px]">
                                <li class="flex justify-around items-center w-full font-black md:text-sm xl:text-base xxl:text-lg">
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
                                    <a href="#">
                                        {{ $currentCurrency }}
                                    </a>
                                    <div
                                        class="border-rounded p-0"
                                        uk-dropdown="pos: bottom-justify; animation: uk-animation-slide-top-small; duration: 400; mode: click"
                                    >
                                        <ul>
                                            @foreach(Constants::SELECTABLE_CURRENCIES as $k => $v)
                                                @if($v !== $currentCurrency)
                                                    <li class="text-center whitespace-nowrap">
                                                        <a
                                                            href="{{ route('change-currency', $k) }}"
                                                            class="text-primary"
                                                        >
                                                            {{ $v }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a class="theme-toggle" href="#"></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Mobile -->

<header
    class="header relative {{ $isNothingFoundPage ? 'nothing-found-bg' : 'bg-primary' }} uk-hidden@m uk-sticky z-[1001]"
    uk-scrollspy="target: .animateText; cls: uk-animation-slide-left-small; delay: 300"
    uk-sticky="animation: uk-animation-slide-top; sel-target: .header; cls-active: uk-navbar-sticky1; cls-inactive: z-[1001]; top: 200;"
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
                    class="uk-navbar-toggle animateText uk-icon uk-navbar-toggle-icon uk-scrollspy-inview {{ $isNothingFoundPage ? 'text-primary' : '' }}"
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
                            <li class="pl-0">
                                <a
                                    href="{{ route('pages.listing.index') }}"
                                    class="uppercase"
                                >
                                    {{ __('general.nav_listings') }}
                                </a>
                            </li>
                            <li class="pl-0">
                                <a
                                    href="{{ route('pages.club.index') }}"
                                    class="uppercase"
                                >
                                    {{ __('general.nav_ic') }}
                                </a>
                            </li>
                            <li class="pl-0">
                                <a
                                    href="{{ route('pages.insight.index') }}"
                                    class="uppercase"
                                >
                                    {{ __('general.nav_insights') }}
                                </a>
                            </li>
                            <li class="pl-0">
                                <a
                                    href="{{ route('pages.about.index') }}"
                                    class="uppercase"
                                >
                                    {{ __('general.nav_about') }}
                                </a>
                            </li>
                            <!-- Locale Switcher -->
                            <li class="pl-0">
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
                            <!-- Currency Switcher -->
                            <li class="pl-0">
                                <ul class="uk-nav-default uk-nav-parent-icon uk-nav" uk-nav>
                                    <li class="uk-parent uk-active">
                                        <a href="#">
                                            {{ $currentCurrency }}
                                        </a>
                                        <ul class="uk-nav-sub" hidden>
                                            @foreach(Constants::SELECTABLE_CURRENCIES as $k => $v)
                                                @if($v !== $currentCurrency)
                                                    <li>
                                                        <a href="{{ route('change-currency', $k) }}">
                                                            {{ $v }}
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- Search -->
                            <li class="p-0 sm:hidden relative">
                                @php($isInsightsPage = str_contains(request()->fullUrl(), 'insights'))
                                @if ($isInsightsPage)
                                    <form
                                        id="mobileSearch"
                                        action="{{ route('pages.insight.index') }}"
                                        autocomplete="off"
                                        @keydown.enter="$event.target.closest('form').submit()"
                                    >
                                        <input
                                            id="title"
                                            type="text"
                                            name="title"
                                            placeholder="Search..."
                                            class="w-full border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-500 py-2 placeholder-secondary"
                                        />
                                        <button
                                            class="absolute top-1 right-1 text-3xl bg-transparent border-none outline-none"
                                            type="button"
                                            uk-toggle="target: #insightFilterModal"
                                        >
                                            +
                                        </button>
                                    </form>
                                @else
                                    <form
                                        id="mobileSearch"
                                        action="{{ route('pages.listing.index') }}"
                                        autocomplete="off"
                                        @keydown.enter="$event.target.closest('form').submit()"
                                    >
                                        <input
                                            id="title"
                                            type="text"
                                            name="title"
                                            placeholder="Search..."
                                            class="w-full border-b-2 border-gray-300 bg-transparent focus:outline-none focus:border-blue-500 py-2 placeholder-secondary"
                                        />
                                        <button
                                            class="absolute top-1 right-1 text-3xl bg-transparent border-none outline-none"
                                            type="button"
                                            uk-toggle="target: #listingFilterModal"
                                        >
                                            +
                                        </button>
                                    </form>
                                @endif
                            </li>
                            <!-- Theme Switcher -->
                            <li class="pl-0">
                                <a class="theme-toggle" href="#"></a>
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
