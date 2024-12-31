@props([
    'hotel' => null,
    'similarHotels' => null,
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Card</title>
    <link rel="stylesheet" href="{{ asset('') }}css/style.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/card.css" />
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
                    src="{{ asset('') }}assets/common/logo.svg"
                    alt="logo"
                    width="30"
                    height="30"
                    id="headerLogo"
                />
            </div>
            <span
                class="brand-name"
                style="color: #0f1f3d; transition: color 0.3s"
            >Ignatev Estate</span
            >
        </div>
        <div class="subnav">
            <button
                class="subnavbtn"
                style="color: #0f1f3d; transition: color 0.3s"
            >
                Listings
            </button>
            <div class="subnav-content">
                <a href="{{ route('pages.listing.index') }}">Primary</a>
                <a href="{{ route('pages.listing.index') }}">Resale</a>
                <a href="{{ route('pages.listing.index') }}">Land</a>
            </div>
        </div>
        <div class="subnav">
            <button
                class="subnavbtn"
                style="color: #0f1f3d; transition: color 0.3s"
            >
                Insider Club
            </button>
            <div class="subnav-content">
                <a href="{{ route('pages.club.index') }}">About insider club</a>
                <a href="{{ route('pages.insight.index') }}">Insights</a>
                <a href="#package">Package</a>
                <a href="#express">Express</a>
            </div>
        </div>
        <div class="subnav">
            <button
                class="subnavbtn"
                style="color: #0f1f3d; transition: color 0.3s"
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
                style="color: #0f1f3d; transition: color 0.3s"
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
            <a class="login-btn" href="#"
            ><img
                    src="{{ asset('') }}assets/common/login-icon.svg"
                    alt="login"
                    width="15"
                    height="15"
                /></a>
        </div>
    </div>
</header>

<main class="bg-gray-100">
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

                    <div class="search-divider"></div>
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

    <!--Off plan section-->
    <section class="off-plan-container">
        <h1
            class="uppercase"
            style="
            position: relative;
            font-weight: 900;
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #0f1f3d;
          "
        >
            Off plan | Some object
        </h1>
        <div class="main-card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ ImagePathResolver::resolve($hotel->main_image) ?? asset('assets/card/card-bg.svg') }});">
            <!-- Object Tags -->
            @foreach($hotel->tags as $tag)
                <div class="object-tags">
                    <div class="first-tag uppercase">{{ $tag->name }}</div>
                </div>
            @endforeach
            <!-- Online Tour Button -->
            <div class="online-tour">
                <button>REQUEST ONLINE TOUR</button>
            </div>

            <!-- Object Details (Bottom) -->
            <div class="object-details">
                <div class="object-name-and-logo">
                    <img
                        src="{{ asset('') }}assets/common/ieverified.svg"
                        width="25"
                        height="25"
                    />
                    <div class="object-name">{{ $hotel->title }}</div>
                </div>

                <div class="object-price"><span>FROM </span>${{ $hotel->price }}</div>
            </div>
        </div>
        <!-- Photo Carousel -->
        @if ($hotel->gallery)
            @foreach($hotel->gallery as $image)
                <div class="photo-carousel">
                    <div class="carousel-item first-photo" style="background-image: url({{ ImagePathResolver::resolve($image) ?? asset('assets/card/card1.svg') }});"></div>
                </div>
            @endforeach
        @endif
    </section>

    <!--Object description-->
    <section class="object-description-section">
        <div class="object-description">
            <h1>
                <div class="first-column">🏠 {{ $hotel->type }}</div>
                <div class="second-column">📐 {{ $hotel->area }} m²</div>
                <div class="third-column">🛏️ {{ $hotel->bedrooms }} bedrooms</div>
                <div class="fourth-column">🛁 {{ $hotel->bathrooms }} Bathrooms</div>
                <div class="fifth-column">🏷️ {{ $hotel->codename }}</div>
            </h1>
            <div class="heading-underline"></div>

            <div class="description-container">
                <h2>Welcome</h2>
                <div class="first-desc">
                    {!! $hotel->description !!}
                </div>
            </div>

            <button class="see-more">See more</button>
        </div>
    </section>

    <!--Features section-->
    @if ($hotel->features)
    <section class="features-section">
        <div class="feature-block grid grid-cols-2 gap-4 sm:grid-cols-4 p-4">
            @foreach($hotel->features as $feature)
                <div
                    class="first-feature flex items-center justify-center bg-white p-4 rounded-2xl shadow-sm"
                >
                    {{ $feature->icon ?? '👮' }} {{ $feature->name }}
                </div>
            @endforeach
        </div>
    </section>
    @endif
    <!--Luna AI section-->
    <section class="luna-ai-section hidden">
        <div class="luna-ai flex flex-col items-center gap-4 p-4">
            <div class="progress-bar w-full">
                <div class="flex justify-between items-center mb-2">
                    <div class="company-placeholder text-gray-600 font-medium">
                        Ignatev Estate Score
                    </div>
                    <div class="learn-more text-blue-500 cursor-pointer">
                        Learn more
                    </div>
                </div>
                <div class="w-full h-4 bg-gray-300 rounded">
                    <div class="h-full bg-blue-500 rounded" style="width: 50%"></div>
                </div>
            </div>
            <div class="action-luna text-center text-gray-700 font-medium">
                Analyse this project with our unique luna AI
            </div>
        </div>
    </section>

    <!--About developer section-->
    <section class="about-developer-section">
        <div
            class="about-developer flex gap-20 p-4 items-center justify-center"
        >
            <div class="logo-developer w-30 h-30 rounded overflow-hidden">
                <img
                    src="{{ asset('') }}assets/devlogo.svg"
                    alt="Developer Logo"
                    class="w-full h-full object-cover"
                />
            </div>
            <div class="content-developer flex flex-col">
                <h1 class="flex items-center gap-2 mb-2">
                    <div class="award-one text-yellow-500 text-lg">⭐</div>
                    <div class="award-two text-yellow-500 text-lg">⭐</div>
                    <div class="award-three text-yellow-500 text-lg">⭐</div>
                </h1>
                <p class="desc-developer text-gray-700 max-w-[75ch]">
                    Our journey with Phuket’s off-plan real estate market began in
                    2017, not as service providers, but as investors. Despite the
                    market’s growth potential, we quickly discovered significant flaws
                    that made navigating this landscape challenging. Our journey with
                    Phuket’s off-plan real estate market began in 2017, not as service
                    providers, but as investors.
                </p>
            </div>
        </div>
    </section>

    <!--Floor plans section-->
    <section class="floor-plans-section">
        <div class="floor-plans">
            <h1>Floor plans</h1>
            <div class="main-view"></div>
            @if ($hotel->floors)
                <div class="floor-group">
                    @php($count = 1)
                    @foreach($hotel->floors as $floor)
                        <div class="collapse-info">
                            <button type="button" class="collapsible">
                                <h1>
                                    <div class="left-wrapper">
                                        <div class="left-items">
                                            <div class="floor-name">Floor {{ $count }}</div>
                                            <div class="floor-beds">🛏️ {{ $floor->bedrooms }}</div>
                                            <div class="floor-baths">🛁 {{ $floor->bathrooms }}</div>
                                            <div class="floor-meter">📐 {{ $floor->area }} m²</div>
                                        </div>
                                    </div>
                                    <div class="open-menu">-</div>
                                </h1>
                            </button>
                            <div class="content">
                                <div class="floor-photo"></div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        @php($count++)
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!--Map to us section-->
    <section class="map-to-us-section">
        <div class="map-to-us">
            <div id="map-to-us"></div>
        </div>
    </section>

    <!--Nearby objects section-->
    <section class="nearby-objects-section">
        <h1>Nearby objects</h1>
        <div class="nearby-wrapper">
            <!-- Restaurants -->
            <div class="collapse-info">
                <button type="button" class="collapsible">
                    <h1>
                        <div class="left-wrapper">
                            <div class="left-items">
                                <div class="floor-name">🍽️ Restaurants</div>
                            </div>
                        </div>
                        <div class="open-menu">+</div>
                    </h1>
                </button>
                <div class="content">
                    <div class="cafe-list">
                        <div class="first-cafe">
                            <div class="left-wrapper">
                                <h1>number one restaurant (390m)</h1>
                            </div>
                            <div class="right-wrapper">
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                            </div>
                        </div>
                        <div class="first-cafe">
                            <div class="left-wrapper">
                                <h1>another great restaurant (250m)</h1>
                            </div>
                            <div class="right-wrapper">
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <!-- Bars -->
            <div class="collapse-info">
                <button type="button" class="collapsible">
                    <h1>
                        <div class="left-wrapper">
                            <div class="left-items">
                                <div class="floor-name">🍹 Bars</div>
                            </div>
                        </div>
                        <div class="open-menu">+</div>
                    </h1>
                </button>
                <div class="content">
                    <div class="cafe-list">
                        <div class="first-cafe">
                            <div class="left-wrapper">
                                <h1>number one bar (390m)</h1>
                            </div>
                            <div class="right-wrapper">
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                            </div>
                        </div>
                        <div class="first-cafe">
                            <div class="left-wrapper">
                                <h1>another great bar (250m)</h1>
                            </div>
                            <div class="right-wrapper">
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <!-- Beaches -->
            <div class="collapse-info">
                <button type="button" class="collapsible">
                    <h1>
                        <div class="left-wrapper">
                            <div class="left-items">
                                <div class="floor-name">🏖️ Beaches</div>
                            </div>
                        </div>
                        <div class="open-menu">+</div>
                    </h1>
                </button>
                <div class="content">
                    <div class="cafe-list">
                        <div class="first-cafe">
                            <div class="left-wrapper">
                                <h1>number one beach (390m)</h1>
                            </div>
                            <div class="right-wrapper">
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                            </div>
                        </div>
                        <div class="first-cafe">
                            <div class="left-wrapper">
                                <h1>another great beach (250m)</h1>
                            </div>
                            <div class="right-wrapper">
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <!-- Gyms -->
            <div class="collapse-info">
                <button type="button" class="collapsible">
                    <h1>
                        <div class="left-wrapper">
                            <div class="left-items">
                                <div class="floor-name">💪 Gyms</div>
                            </div>
                        </div>
                        <div class="open-menu">+</div>
                    </h1>
                </button>
                <div class="content">
                    <div class="cafe-list">
                        <div class="first-cafe">
                            <div class="left-wrapper">
                                <h1>number one gym (390m)</h1>
                            </div>
                            <div class="right-wrapper">
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                            </div>
                        </div>
                        <div class="first-cafe">
                            <div class="left-wrapper">
                                <h1>another great gym (250m)</h1>
                            </div>
                            <div class="right-wrapper">
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                                <span class="star">⭐</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </section>

    <!--Similar listings section-->
    <section class="similar-listings-section">
        <div class="similar-wrapper">
            <div
                class="flex justify-between items-center mb-2"
                style="max-width: 1200px; margin: 2rem auto"
            >
                <h1>Similar listings</h1>
                <button id="action-button">Subscribe to similar listings</button>
            </div>

            @if ($similarHotels)
                @foreach($similarHotels as $hotel)
                    <div class="objects-carousel">
                        <div class="carousel-item first-obj">
                            @if ($hotel->tags)
                                <div class="object-tags">
                                    @foreach($hotel->tags as $tag)
                                        <div class="first-tag">{{ $tag->name }}</div>
                                    @endforeach
                                    <div class="obj-name">{{ $hotel->title }}</div>
                                    <div class="obj-price">${{ $hotel->price }}</div>
                                </div>
                            @endif
                            <div class="carousel-description">
                                <span>📍 {{ $hotel->title }}</span>
                                <span>🛏️ {{ $hotel->bedrooms }}</span>
                                <span>🛁 {{ $hotel->bathrooms }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
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
<script src="{{ asset('') }}js/card.js"></script>
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

