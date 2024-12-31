@props([
    'hotels' => null,
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('') }}css/style.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/home.css" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.15.1/css/ol.css"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
</head>
<body class="bg-gray-200 min-h-screen flex flex-col">
<!-- Header -->
<header class="absolute w-full z-10">
    <div class="navbar">
        <div class="logo">
            <div class="logo-placeholder">
                <img
                    src="{{ asset('') }}assets/common/logo-white.svg"
                    alt="logo"
                    width="30"
                    height="30"
                />
            </div>
            <span class="brand-name">Ignatev Estate</span>
        </div>
        <div class="subnav">
            <button class="subnavbtn">Listings</button>
            <div class="subnav-content">
                <a href="{{ route('pages.listing.index') }}">Primary</a>
                <a href="{{ route('pages.listing.index') }}">Resale</a>
                <a href="{{ route('pages.listing.index') }}">Land</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn">Insider Club</button>
            <div class="subnav-content">
                <a href="{{ route('pages.club.index') }}">About insider club</a>
                <a href="{{ route('pages.insight.index') }}">Insights</a>
                <a href="#package">Package</a>
                <a href="#express">Express</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn">Services</button>
            <div class="subnav-content">
                <a href="#link1">For developers</a>
                <a href="#link2">For investors</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn">Tools</button>
            <div class="subnav-content">
                <a href="#bring">Master dashboard</a>
                <a href="#deliver">Luna AI</a>
                <a href="#package">Marketing</a>
            </div>
        </div>
        <!-- Currency and Language Switch -->
        <div class="currency-language-login">
            <a class="language-btn" href="#">EN</a>
            <a class="currency-btn" href="#">USD</a>
            <a class="login-btn" href="#"
            ><img
                    src="{{ asset('') }}assets/common/login-icon.svg"
                    alt="login"
                    width="12"
                    height="12"
                /></a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="bg-gray-100">
    <!-- Hero Section -->
    <section class="hero-section relative">
        <div class="about-section-inside-wrapper">
            <div class="hero-header">
                <h2>Clarity for Investors.<br />Visibility for Developers.</h2>
            </div>
            <div class="hero-tags">
                <a class="hero-tag rounded-background">
                    <i class="fa fa-play mr-2"></i>Watch a video
                </a>
                <a class="hero-tag"> Contact us </a>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="search-header">
            <div class="search-container">
                <div class="search-input-wrapper">
                    <li class="nav-link types">
                        <a class="text-gray-500 uppercase">Keywords </a>
                        <ul class="drop-down">
                            <li>Keyword 1</li>
                            <li>Keyword 2</li>
                            <li>Keyword 3</li>
                        </ul>
                    </li>

                    <li class="nav-link types">
                        <a class="text-gray-500 uppercase">Type </a>
                        <ul class="drop-down">
                            <li>Primary</li>
                            <li>Resale</li>
                            <li>Land</li>
                        </ul>
                    </li>

                    <div class="search-divider"></div>
                    <li class="nav-link types">
                        <a class="text-gray-500 uppercase">Location </a>
                        <ul class="drop-down">
                            <li>Bang Tao</li>
                            <li>Bang Tao</li>
                            <li>Bang Tao</li>
                        </ul>
                    </li>

                    <div class="search-divider"></div>
                    <li class="nav-link types">
                        <a class="text-gray-500 uppercase"
                        >🛏️

                            <span class="bed-counter-number" id="bedCounterSearchBar"
                            >1</span
                            >
                        </a>
                        <ul class="drop-down">
                            <li>
                                <div class="bed-counter-container">
                                    <button class="bed-decrease" onclick="decreaseBeds()">
                                        -
                                    </button>
                                    <span class="bed-counter-number" id="bedCounterDropDown"
                                    >From 1</span
                                    >
                                    <button class="bed-increase" onclick="increaseBeds()">
                                        +
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <div class="search-divider"></div>
                    <li class="nav-link types price">
                        <div class="price-container">
                            <div class="price-inputs">
                                <div class="field">
                                    <input
                                        type="number"
                                        class="input-min"
                                        value="0"
                                        placeholder="Min"
                                    />
                                </div>
                                <div class="separator">-</div>
                                <div class="field">
                                    <input
                                        type="number"
                                        class="input-max"
                                        value="10000000"
                                        placeholder="Max"
                                    />
                                </div>
                            </div>
                        </div>

                        <ul class="drop-down">
                            <li>
                                <div class="price-range-container">
                                    <div class="slider-container">
                                        <div class="price-slider">
                                            <div class="progress"></div>
                                        </div>
                                        <div class="range-input">
                                            <input
                                                type="range"
                                                class="range-min"
                                                min="0"
                                                max="10000000"
                                                value="0"
                                                step="1000"
                                            />
                                            <input
                                                type="range"
                                                class="range-max"
                                                min="0"
                                                max="10000000"
                                                value="10000000"
                                                step="1000"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <div class="search-divider"></div>
                    <button
                        class="search-section-btn"
                        onclick="toggleAdvancedSearch()"
                    >
                        <span class="text-gray-500 uppercase">+</span>
                    </button>
                    <!-- Advanced Search Popup -->
                    <div
                        id="advancedSearchPopup"
                        class="advanced-search-popup hidden"
                    >
                        <div class="popup-content">
                            <div class="popup-header uppercase">
                                <h3>Filters</h3>

                                <button onclick="toggleAdvancedSearch()" class="close-btn">
                                    &times;
                                </button>
                            </div>
                            <div class="popup-body">
                                <!--Type filter group-->
                                <div class="popup-filters-container">
                                    <div class="popup-filter-type uppercase">tags |</div>
                                    <button class="chosen-option-btn uppercase">
                                        X Chosen Option
                                    </button>
                                </div>
                                <div class="filter-group">
                                    <div class="checkbox-group">
                                        <div class="filter-selection-container">
                                            <div
                                                class="filter-name uppercase"
                                                style="background-color: #0f1f3d"
                                            >
                                                primary
                                            </div>
                                            <div
                                                class="filter-name uppercase"
                                                style="background-color: #69a8a4"
                                            >
                                                resale
                                            </div>
                                            <div
                                                class="filter-name uppercase"
                                                style="background-color: #5a6bc9"
                                            >
                                                land
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Keywords and Price range-->
                                <div class="left-right-container">
                                    <div class="left-container">
                                        <div class="popup-filters-container">
                                            <div class="popup-filter-type uppercase">
                                                Keywords
                                            </div>
                                        </div>
                                        <div class="keywords-input-container">
                                            <input
                                                type="text"
                                                class="keywords-input uppercase"
                                                style="width: 70%"
                                                placeholder="for example: beautiful view villa"
                                            />
                                            <button
                                                class="keyword-luna-ai-btn uppercase"
                                                style="
                              width: 70%;
                              color: white;
                              font-weight: 900;
                              font-size: 1rem;
                              background-color: #662884;
                              border-radius: 10px;
                              margin: 1rem auto;
                            "
                                            >
                                                analyze wih ai
                                            </button>
                                        </div>
                                    </div>
                                    <div class="right-container">
                                        <div class="popup-filters-container">
                                            <div class="popup-filter-type uppercase">
                                                Price range
                                            </div>
                                        </div>
                                        <div class="from-to-price-container">
                                            <div class="from-price-container">
                                                <input
                                                    type="number"
                                                    class="from-price-input"
                                                    placeholder="From"
                                                />
                                                <span class="thin-underline"> </span>
                                            </div>
                                            <div class="to-price-container">
                                                <input
                                                    type="number"
                                                    class="to-price-input"
                                                    placeholder="To"
                                                />
                                                <span class="thin-underline"> </span>
                                            </div>
                                        </div>
                                        <div class="price-slider-container">
                                            <div class="price-slider">
                                                <div class="progress-popup"></div>
                                            </div>
                                            <div class="range-input-popup">
                                                <input
                                                    type="range"
                                                    class="range-min-popup"
                                                    min="0"
                                                    max="10000000"
                                                    value="0"
                                                    step="1000"
                                                />
                                                <input
                                                    type="range"
                                                    class="range-max-popup"
                                                    min="0"
                                                    max="10000000"
                                                    value="10000000"
                                                    step="1000"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Location -->
                                <div class="popup-filters-container">
                                    <div class="popup-filter-type uppercase">location |</div>
                                    <button class="chosen-option-btn uppercase">
                                        X Chosen Option
                                    </button>
                                </div>
                                <div id="map-filter"></div>

                                <!--Facilities filter group-->
                                <div class="popup-filters-container">
                                    <div class="popup-filter-type uppercase">
                                        facilities |
                                    </div>
                                    <button class="chosen-option-btn uppercase">
                                        X Chosen Option
                                    </button>
                                </div>
                                <div class="left-right-container">
                                    <div class="left-container">
                                        <div class="popup-filters-container">
                                            <div
                                                class="popup-filter-type uppercase"
                                                style="color: #c6c6c6"
                                            >
                                                Bathrooms
                                            </div>
                                        </div>
                                        <div class="bathrooms-slider-container">
                                            <div class="bathroom-emoji">🛁</div>
                                            <div class="bathroom-slider">
                                                <div
                                                    class="bathroom-progress"
                                                    style="background-color: #0f1f3d; margin: 0.5rem"
                                                ></div>
                                                <div
                                                    class="range-values"
                                                    style="
                                display: flex;
                                justify-content: space-between;
                                margin: 0 2rem;
                              "
                                                >
                                                    <span>0</span>
                                                    <span id="bathroom-value">0</span>
                                                </div>
                                                <input
                                                    type="range"
                                                    class="bathroom-range"
                                                    min="0"
                                                    max="7"
                                                    value="0"
                                                    step="1"
                                                    oninput="document.getElementById('bathroom-value').textContent = this.value"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-container">
                                        <div class="popup-filters-container">
                                            <div
                                                class="popup-filter-type uppercase"
                                                style="color: #c6c6c6"
                                            >
                                                Bedrooms
                                            </div>
                                        </div>
                                        <div class="bedroom-slider-container">
                                            <div class="bedroom-emoji">🛏️</div>
                                            <div class="bedroom-slider">
                                                <div
                                                    class="bedroom-progress"
                                                    style="background-color: #0f1f3d; margin: 0.5rem"
                                                ></div>
                                                <div
                                                    class="range-values"
                                                    style="
                                display: flex;
                                justify-content: space-between;
                                margin: 0 2rem;
                              "
                                                >
                                                    <span>0</span>
                                                    <span id="bedroom-value">0</span>
                                                </div>
                                                <input
                                                    type="range"
                                                    class="bedroom-range"
                                                    min="0"
                                                    max="7"
                                                    value="0"
                                                    step="1"
                                                    oninput="document.getElementById('bedroom-value').textContent = this.value"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="other-facilities-container">
                                    <div class="grid grid-cols-4 grid-rows-1 gap-2">
                                        <div class="other-facility-item">
                                            <div class="other-facility-emoji">🏋️‍♂️</div>
                                            <div class="other-facility-name">
                            <span class="other-facility-name-text uppercase">
                              Gym
                            </span>
                                            </div>
                                        </div>

                                        <div class="other-facility-item">
                                            <div class="other-facility-emoji">🏊</div>
                                            <div class="other-facility-name">
                            <span class="other-facility-name-text uppercase">
                              pool
                            </span>
                                            </div>
                                        </div>

                                        <div class="other-facility-item">
                                            <div class="other-facility-emoji">🏖</div>
                                            <div class="other-facility-name">
                            <span class="other-facility-name-text uppercase">
                              Beach
                            </span>
                                            </div>
                                        </div>

                                        <div class="other-facility-item">
                                            <div class="other-facility-emoji">👨‍🍳</div>
                                            <div class="other-facility-name">
                            <span class="other-facility-name-text uppercase">
                              Chef
                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Tags filter group-->
                                <div class="popup-filters-container">
                                    <div class="popup-filter-type uppercase">tags |</div>
                                    <button class="chosen-option-btn uppercase">
                                        X Chosen Option
                                    </button>
                                </div>
                                <div class="filter-group">
                                    <div class="checkbox-group">
                                        <div class="filter-selection-container">
                                            <div
                                                class="filter-name uppercase"
                                                style="background-color: #0f1f3d"
                                            >
                                                Research
                                            </div>
                                            <div
                                                class="filter-name uppercase"
                                                style="background-color: #69a8a4"
                                            >
                                                Luxury
                                            </div>
                                            <div
                                                class="filter-name uppercase"
                                                style="background-color: #5a6bc9"
                                            >
                                                Summer
                                            </div>
                                            <div
                                                class="filter-name uppercase"
                                                style="background-color: #5a6bc9"
                                            >
                                                Condo
                                            </div>
                                            <div
                                                class="filter-name uppercase"
                                                style="background-color: #5a6bc9"
                                            >
                                                Smth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Popup footer group-->
                            <div class="popup-footer">
                                <button class="apply-btn uppercase">
                                    show 124 results
                                </button>
                            </div>
                        </div>
                    </div>

                    <button class="circle-button search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!--The problem we solve-->
    <section class="problem-we-solve-section">
        <div class="problem-we-solve-container">
            <h1 class="problem-we-solve-title uppercase">The Problem We Solve</h1>
            <div class="problem-we-solve-content">
                <p>
                    We transform off-plan real estate sales by showcasing projects
                    based on their true merit and potential, not just an agent’s
                    reputation or glossy brochures.  We provide comprehensive,
                    data-driven insights that empower investors to make decisions
                    based on a project’s actual value, fostering a more transparent
                    and efficient marketplace where quantified and holistically proven
                    quality speaks louder than sales pitches.
                </p>
            </div>
            <div class="how-we-serve-container">
                <h1 class="how-we-serve-title uppercase">How we serve</h1>
                <button class="investors-btn uppercase">Investors</button>
                <button class="developers-btn uppercase">Developers</button>
            </div>
        </div>
    </section>

    <!--Primary Resale Land section-->
    <section class="primary-resale-land-section">
        <!-- Add the sub-grid here -->
        <div class="sub-grid-container">
            <div class="grid grid-cols-3 grid-rows-1 gap-4">
                <div
                    class="bg-cover bg-center h-48 flex items-center justify-center rounded-2xl"
                    style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.9)
                  ),
                  url('{{ asset('')}}assets/common/primary.svg');
              "
                >
                    <div class="p-4">
                        <h3 class="text-white text-4xl font-bold uppercase">Primary</h3>
                    </div>
                </div>
                <div
                    class="bg-cover bg-center h-48 flex items-center justify-center rounded-2xl"
                    style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.9)
                  ),
                  url('{{ asset('')}}assets/common/resale.svg');
              "
                >
                    <div class="p-4">
                        <h3 class="text-white text-4xl font-bold uppercase">Resale</h3>
                    </div>
                </div>
                <div
                    class="bg-cover bg-center h-48 flex items-center justify-center rounded-2xl"
                    style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.9)
                  ),
                  url('{{ asset('')}}assets/common/land.svg');
              "
                >
                    <div class="p-4">
                        <h3 class="text-white text-4xl font-bold uppercase">Land</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Media Us-->
    <section class="media-us-section">
        <div class="media-us-container">
            <h1 class="media-us-title uppercase">Media about us</h1>
        </div>
        <div class="logos-slide">
            <div class="logo-container">
                <img src="{{ asset('') }}assets/home/reuters.svg" />
            </div>

            <div class="logo-container">
                <img src="{{ asset('') }}assets/home/bloomberg.svg" />
            </div>

            <div class="logo-container">
                <img src="{{ asset('') }}assets/home/nyt.svg" />
            </div>

            <div class="logo-container">
                <img src="{{ asset('') }}assets/home/markets.svg" />
            </div>

            <div class="logo-container">
                <img src="{{ asset('') }}assets/home/reuters.svg" />
            </div>

            <div class="logo-container">
                <img src="{{ asset('') }}assets/home/reuters.svg" />
            </div>
        </div>
    </section>

    <!--IE Verified-->
    <section class="ie-verified-section">
        <div class="ie-verified-container">
            <img src="{{ asset('') }}assets/common/ieverified.svg" />
            <h1 class="ie-verified-title uppercase">IE Verified</h1>
        </div>
        <div class="ie-verified-grid mt-8">
            <div class="grid grid-cols-2 grid-rows-1 gap-4">
                <div class="for-investors-container">
                    <h1 class="for-investors-title uppercase">For investors</h1>
                    <p class="for-investors-description">
                        “Data & Quality Mark You Can Trust.”<br />
                        We do the research. You get the facts, clarity & best terms.
                    </p>
                </div>
                <div class="for-developers-container">
                    <h1 class="for-developers-title uppercase">For developers</h1>
                    <p class="for-developers-description">
                        “Data & Quality Mark You Can Trust.”<br />
                        We do the research. You get the facts, clarity & best terms.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--Verified Projects-->
    @if ($hotels)
        <section class="verified-projects-section">
            <div class="verified-projects-container">
                <div class="grid grid-cols-3 grid-rows-1 gap-4">
                    @foreach($hotels->take(3) as $hotel)
                        <a href="{{ route('pages.listing.show', ['slug' => $hotel->slug]) }}">
                            <div
                                class="bg-cover bg-center h-80 flex flex-col justify-between rounded-2xl p-4 relative"
                                style="background-image: linear-gradient(
                                    rgba(0, 0, 0, 0.5),
                                    rgba(0, 0, 0, 0.5)
                                  ),
                                  url('{{ ImagePathResolver::resolve($hotel->main_image) ?? asset('assets/common/primary.svg') }}');"
                            >
                                <!-- Top Row -->
                                <div class="flex justify-between">
                                    <!-- Top Left Tags -->
                                    <div class="flex gap-2">
                                        <div class="bg-blue-200 bg-opacity-50 px-2 py-1 rounded-full">
                                            <span class="text-white text-xs uppercase font-black">{{ $hotel->type }}</span>
                                        </div>
                                    </div>
                                    <!-- Top Right Buttons -->
                                    <div class="flex gap-2 items-center justify-center">
                                        <button class="text-white hover:text-gray-200">
                                            <img
                                                src="{{ asset('') }}assets/home/oncompareicon.svg"
                                                alt="Compare"
                                                class="w-5 h-5"
                                            />
                                        </button>
                                        <button class="text-white hover:text-gray-200 mt-1">
                                            <i class="fas fa-heart text-xl"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Bottom Row -->
                                <div class="flex justify-between items-end">
                                    <!-- Bottom Left -->
                                    <div class="flex items-center gap-2">
                                        <img
                                            src="{{ asset('') }}assets/common/ieverified.svg"
                                            alt="Verified"
                                            class="w-7 h-7"
                                        />
                                        <span class="text-white font-bold uppercase"
                                        >{{ $hotel->title }}</span
                                        >
                                    </div>
                                    <!-- Bottom Right -->
                                    <div class="text-white font-bold">${{ $hotel->price }}</div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!--Value no strings attached section-->
    <section class="value-section">
        <h1 class="value-title uppercase">Value no strings attached</h1>
        <p class="value-description-1">
            We believe in proving our worth upfront. That’s why some of our most
            valuable insights and some services are free. Get the clarity you need
            without commitment, and see why smart investors and developers trust
            us from the start.
        </p>
        <p class="value-description-2">
            We don’t just provide unique, exclusive, and curated listings—we
            create opportunities. For investors, it’s about clarity and
            confidence. For developers, it’s about visibility and trust. Together,
            we’re shaping the future of real estate with seamless, reliable
            solutions that go beyond the market standard.
        </p>
    </section>

    <!--What we offer-->
    <section class="we-offer-section">
        <div class="faq-container">
            <button class="accordion">
                <img
                    width="25"
                    height="25"
                    src="{{ asset('') }}assets/club/criteria1.svg"
                    alt="Criteria icon"
                    class="criteria-icon"
                />
                Off-Plan Property Sales for Buyers and Investors
            </button>
            <div class="panel">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="divider"></div>

            <button class="accordion">
                <img
                    width="25"
                    height="25"
                    src="{{ asset('') }}assets/club/criteria2.svg"
                    alt="Criteria icon"
                    class="criteria-icon"
                />
                Personalized Investment Insights
            </button>
            <div class="panel">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="divider"></div>

            <button class="accordion">
                <img
                    width="25"
                    height="25"
                    src="{{ asset('') }}assets/club/criteria3.svg"
                    alt="Criteria icon"
                    class="criteria-icon"
                />
                Exclusive Pre-Sale Access
            </button>
            <div class="panel">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="divider"></div>

            <button class="accordion">
                <img
                    width="25"
                    height="25"
                    src="{{ asset('') }}assets/club/criteria4.svg"
                    alt="Criteria icon"
                    class="criteria-icon"
                />
                Insider Club for Investors
            </button>
            <div class="panel">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="divider"></div>

            <button class="accordion">
                <img
                    width="25"
                    height="25"
                    src="{{ asset('') }}assets/club/criteria5.svg"
                    alt="Criteria icon"
                    class="criteria-icon"
                />
                Helping Developers Sell Faster
            </button>
            <div class="panel">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="divider"></div>

            <button class="accordion">
                <img
                    width="25"
                    height="25"
                    src="{{ asset('') }}assets/club/criteria6.svg"
                    alt="Criteria icon"
                    class="criteria-icon"
                />
                Off-Plan Project Listing Platform
            </button>
            <div class="panel">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="divider"></div>
        </div>
    </section>

    <!--Our clients-->
    <section class="our-clients-section">
        <div class="our-clients-header-container">
            <h1 class="our-clients-header uppercase">Our clients</h1>
            <button class="our-clients-header-btn uppercase">
                add your review
            </button>
        </div>
        <div class="our-clients-grid">
            <div class="grid grid-cols-3 grid-rows-1 gap-4">
                <div class="rounded-2xl">
                    <!-- Background with overlay -->
                    <div
                        class="bg-cover"
                        style="
                  background-image: linear-gradient(
                      rgba(0, 0, 0, 0.5),
                      rgba(0, 0, 0, 0.5)
                    ),
                    url('https://images.unsplash.com/photo-1629079448105-35ab3e5152d4?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
                "
                    ></div>

                    <!-- Content container -->
                    <div class="relative">
                        <!-- Client image -->
                        <img
                            src="{{ asset('') }}assets/home/client1.svg"
                            alt="Client"
                            class="client-image"
                        />

                        <div class="text-center">
                            <h1 class="name-placeholder">Name Surname</h1>
                            <p class="client-description-placeholder">
                                Are you ready to be part of something extraordinary? Welcome
                                to the Insider's Club
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl">
                    <!-- Background with overlay -->
                    <div
                        class="bg-cover"
                        style="
                  background-image: linear-gradient(
                      rgba(0, 0, 0, 0.5),
                      rgba(0, 0, 0, 0.5)
                    ),
                    url('https://images.unsplash.com/photo-1649083047668-e57d682e5749?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
                "
                    ></div>

                    <!-- Content container -->
                    <div class="relative">
                        <!-- Client image -->
                        <img
                            src="{{ asset('') }}assets/home/client2.svg"
                            alt="Client"
                            class="client-image"
                        />

                        <div class="text-center">
                            <h1 class="name-placeholder">Name Surname</h1>
                            <p class="client-description-placeholder">
                                Are you ready to be part of something extraordinary? Welcome
                                to the Insider's Club
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl">
                    <!-- Background with overlay -->
                    <div
                        class="bg-cover"
                        style="
                  background-image: linear-gradient(
                      rgba(0, 0, 0, 0.5),
                      rgba(0, 0, 0, 0.5)
                    ),
                    url('https://images.unsplash.com/photo-1554995207-c18c203602cb?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
                "
                    ></div>

                    <!-- Content container -->
                    <div class="relative">
                        <!-- Client image -->
                        <img
                            src="{{ asset('') }}assets/home/client3.svg"
                            alt="Client"
                            class="client-image"
                        />

                        <div class="text-center">
                            <h1 class="name-placeholder">Name Surname</h1>
                            <p class="client-description-placeholder">
                                Are you ready to be part of something extraordinary? Welcome
                                to the Insider's Club
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Let's discuss-->
    <section class="lets-discuss-section">
        <div class="lets-discuss-container">
            <h1 class="lets-discuss-title uppercase">
                Let's discuss your project
            </h1>
            <button class="lets-discuss-btn uppercase">Contact us</button>
        </div>
        <div class="lets-discuss-content">
            <p>
                We will run your project through our assessment tools so that
                opportunities and risks are captured and quantified.
            </p>
        </div>
    </section>

    <!--FAQ-->
    <section class="faq-bottom-section">
        <div class="faq-bottom-container">
            <h1 class="faq-bottom-title uppercase">Faq</h1>
            <button class="faq-bottom-btn uppercase">Ask us something</button>
        </div>

        <div class="faq-container">
            <button class="accordion uppercase">question 1</button>
            <div class="panel">
                <p>
                    We connect buyers and investors to real opportunities through
                    carefully selected off-plan projects that offer genuine value and
                    clear potential.
                </p>
            </div>
            <div class="divider"></div>

            <button class="accordion uppercase">question 2</button>
            <div class="panel">
                <p>
                    We connect buyers and investors to real opportunities through
                    carefully selected off-plan projects that offer genuine value and
                    clear potential.
                </p>
            </div>
            <div class="divider"></div>

            <button class="accordion uppercase">question 3</button>
            <div class="panel">
                <p>
                    We connect buyers and investors to real opportunities through
                    carefully selected off-plan projects that offer genuine value and
                    clear potential.
                </p>
            </div>
            <div class="divider"></div>
        </div>
    </section>

    <!--Contact us section-->
    <section class="contact-us-section">
        <div class="contact-us-header-container">
            <h1 class="contact-us-title uppercase">Contact Us</h1>
            <div class="contact-right-content">
                <div class="social-links-container">
                    <button>
                        <img src="{{ asset('') }}assets/common/facebook.svg" alt="Facebook" />
                    </button>
                    <button>
                        <img src="{{ asset('') }}assets/common/vk.svg" alt="Vk" />
                    </button>
                    <button>
                        <img src="{{ asset('') }}assets/common/emailicon.svg" alt="Email" />
                    </button>
                    <button>
                        <img src="{{ asset('') }}assets/common/x.svg" alt="Twitter" />
                    </button>
                </div>
                <div class="phone-container">
                    <img src="{{ asset('') }}assets/common/phoneicon.svg" alt="Phone" />+7 (972)
                    928-30-12
                </div>
            </div>
        </div>
        <div class="contact-us-form-container">
            <form>
                <div class="input-row">
                    <input type="text" id="name" placeholder="Name" />
                    <input type="email" id="email" placeholder="Email" />
                </div>
                <textarea
                    id="message"
                    maxlength="250"
                    placeholder="Message"
                ></textarea>
            </form>
        </div>
        <div class="contact-us-button-container">
            <button id="send-message-button">Send</button>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="footer">
    <div class="map">
        <div id="map"></div>
    </div>
    <div class="footer-container">
        <!-- Footer Navigation -->
        <nav class="footer-nav">
            <ul class="footer-links">
                <li><a href="#listings">Listings</a></li>
                <li><a href="#insider-club">Insider Club</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#tools">Tools</a></li>
                <li><a href="#terms-of-use">Terms of Use</a></li>
                <li><a href="#privacy-policy">Privacy Policy</a></li>
            </ul>
        </nav>

        <!-- Social Links and Contact -->
        <div class="footer-social-contact">
            <div class="social-links-container">
                <button>
                    <img src="{{ asset('') }}assets/common/white-social1.svg" alt="Facebook" />
                </button>
                <button>
                    <img src="{{ asset('') }}assets/common/white-social2.svg" alt="Vk" />
                </button>
                <button>
                    <img src="{{ asset('') }}assets/common/white-social3.svg" alt="Email" />
                </button>
                <button>
                    <img src="{{ asset('') }}assets/common/white-social4.svg" alt="Twitter" />
                </button>
            </div>
            <div class="phone-container">
                <img src="{{ asset('') }}assets/common/white-phone.svg" alt="Phone" />+7 (972)
                928-30-12
            </div>
        </div>

        <!-- Footer Bottom Text -->
        <div class="footer-bottom">
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            Ignatev Estate. All rights reserved.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.15.1/build/ol.js"></script>
<script src="{{ asset('') }}js/home.js"></script>

<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Go to top">
    <img
        src="{{ asset('') }}assets/home/scroll.svg"
        alt="Arrow up"
        width="20"
        height="20"
    />
</button>
</body>
</html>
