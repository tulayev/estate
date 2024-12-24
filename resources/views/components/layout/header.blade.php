@php
    use App\Helpers\Constants;
    use Illuminate\Support\Facades\Route;

    $isIdenticalColorPages = in_array(Route::currentRouteName(), Constants::IDENTICAL_COLOR_PAGES );
@endphp

<!-- Header -->
<header class="absolute w-full z-10">
    <div class="navbar">
        <div class="logo">
            <div class="logo-placeholder">
                <img
                    src="{{ asset('assets/img') }}/common/{{ $isIdenticalColorPages ? 'logo-white.svg' : 'logo.svg' }}"
                    alt="logo"
                    width="30"
                    height="30"
                    id="headerLogo"
                />
            </div>
            <span
                class="brand-name"
                style="{{ $isIdenticalColorPages ? '' : 'color: #0f1f3d; transition: color 0.3s' }}">
                Ignatev Estate
            </span>
        </div>
        <div class="subnav">
            <button
                class="subnavbtn"
                style="{{ $isIdenticalColorPages ? '' : 'color: #0f1f3d; transition: color 0.3s' }}"
            >
                Listings
            </button>
            <div class="subnav-content">
                <a href="#company">Primary</a>
                <a href="#team">Resale</a>
                <a href="#careers">Land</a>
            </div>
        </div>
        <div class="subnav">
            <button
                class="subnavbtn"
                style="{{ $isIdenticalColorPages ? '' : 'color: #0f1f3d; transition: color 0.3s' }}"
            >
                Insider Club
            </button>
            <div class="subnav-content">
                <a href="#bring">About insider club</a>
                <a href="#deliver">Insights</a>
                <a href="#package">Package</a>
                <a href="#express">Express</a>
            </div>
        </div>
        <div class="subnav">
            <button
                class="subnavbtn"
                style="{{ $isIdenticalColorPages ? '' : 'color: #0f1f3d; transition: color 0.3s' }}"
            >
                Services
            </button>
            <div class="subnav-content">
                <a href="#link1">For developers</a>
                <a href="#link2">For investors</a>
            </div>
        </div>
        <div class="subnav">
            <button
                class="subnavbtn"
                style="{{ $isIdenticalColorPages ? '' : 'color: #0f1f3d; transition: color 0.3s' }}"
            >
                Tools
            </button>
            <div class="subnav-content">
                <a href="#bring">Master dashboard</a>
                <a href="#deliver" class="hidden">Luna AI</a>
                <a href="#package">Marketing</a>
            </div>
        </div>
        <!-- Currency and Language Switch -->
        <div class="currency-language-login">
            <a class="language-btn" href="#">EN</a>
            <a class="currency-btn" href="#">USD</a>
            <a class="login-btn" href="#">
                <img
                    src="{{ asset('assets/img') }}/common/login-icon.svg"
                    alt="login"
                    width="15"
                    height="15"
                />
            </a>
        </div>
    </div>
</header>
