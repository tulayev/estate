<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listings</title>
    <link rel="stylesheet" href="{{ asset('') }}css/style.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/listings.css" />
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
            <button class="subnavbtn">
                Listings <i class="fa fa-caret-down"></i>
            </button>
            <div class="subnav-content">
                <a href="{{ route('pages.listing.index') }}">Primary</a>
                <a href="{{ route('pages.listing.index') }}">Resale</a>
                <a href="{{ route('pages.listing.index') }}">Land</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn">
                Insider Club <i class="fa fa-caret-down"></i>
            </button>
            <div class="subnav-content">
                <a href="{{ route('pages.club.index') }}">About insider club</a>
                <a href="{{ route('pages.insight.index') }}">Insights</a>
                <a href="#package">Package</a>
                <a href="#express">Express</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn">
                Services <i class="fa fa-caret-down"></i>
            </button>
            <div class="subnav-content">
                <a href="#link1">For developers</a>
                <a href="#link2">For investors</a>
            </div>
        </div>
        <div class="subnav">
            <button class="subnavbtn">
                Tools <i class="fa fa-caret-down"></i>
            </button>
            <div class="subnav-content">
                <a href="#bring">Master dashboard</a>
                <a href="#deliver">Luna AI</a>
                <a href="#package">Marketing</a>
            </div>
        </div>
        <!-- Currency and Language Switch -->
        <div class="currency-language">
            <a href="#">EN</a>
            <a href="#">USD</a>
        </div>
    </div>
</header>

<main class="bg-gray-100">
    <section>
        <!-- Hero Section -->
        <div class="hero-section relative">
            <h1 class="hero-heading uppercase">new listing</h1>
            <p class="hero-text">
                Buying a property with the intent to sell it later—whether in the
                short or long term—requires strategic planning and market insight.
                At <strong>Ignatev Estate</strong>, we specialize in identifying
                properties that are not only great investments now but will also be
                in demand when you're ready to sell. Here's how to ensure the
                property you buy today is something you'll be able to sell tomorrow,
                for profit or convenience.
            </p>
            <div class="hero-buttons">
                <button
                    class="btn-research uppercase"
                    style="background-color: #69a8a4"
                >
                    Research
                </button>
                <button
                    class="btn-luxury uppercase"
                    style="background-color: #23334b"
                >
                    Luxury
                </button>
                <button
                    class="btn-summer uppercase"
                    style="background-color: #767e94"
                >
                    Summer
                </button>
            </div>
        </div>

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

                                    <button
                                        onclick="toggleAdvancedSearch()"
                                        class="close-btn"
                                    >
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
                                        <div class="popup-filter-type uppercase">
                                            location |
                                        </div>
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
                                                        style="
                                  background-color: #0f1f3d;
                                  margin: 0.5rem;
                                "
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
                                                        style="
                                  background-color: #0f1f3d;
                                  margin: 0.5rem;
                                "
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

        <!--For Sale Off plan section-->
        <section class="for-sale-grid">
            <div class="for-sale-header">
                <h1 class="for-sale-title uppercase">For sale | off plan</h1>
                <div class="for-sale-header-right">
                    <button id="mapViewBtn">🗺</button>
                    <button id="list-view-btn">
                        <img src="{{ asset('') }}assets/listings/list-view-icon.svg" />
                    </button>
                    <button id="gridViewBtn">
                        <img src="{{ asset('') }}assets/listings/grid-view-icon.svg" />
                    </button>
                    <button id="sortViewBtn">
                        <img src="{{ asset('') }}assets/listings/sort-icon.svg" />
                    </button>
                </div>
            </div>

            @if ($hotels)
                <div
                    id="viewContainer"
                    class="grid grid-cols-3 grid-rows-3 gap-4 flex-wrap"
                >
                    @foreach($hotels as $hotel)
                        <a href="{{ route('pages.listing.show', ['slug' => $hotel->slug]) }}">
                            <div
                                class="topic-card"
                                style="background: url({{ ImagePathResolver::resolve($hotel->main_image) ?? asset('assets/insights/card1.svg') }}), linear-gradient(rgba(26, 43, 76, 0.3), rgba(40, 50, 76, 0.3)), center/cover;"
                            >
                                <div class="card-header">
                                    <div class="topic-tag">{{ $hotel->type }}</div>
                                    <button class="like-btn"><i class="fas fa-heart"></i></button>
                                </div>

                                <h1 class="topic-title">
                                    {{ $hotel->title }}
                                </h1>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
{{--            <button--}}
{{--                id="see-more"--}}
{{--                class="uppercase"--}}
{{--                style="color: #0f1f3d; font-weight: 900"--}}
{{--            >--}}
{{--                See more--}}
{{--            </button>--}}
        </section>

        <!--Subscribe section-->
        <section class="subscribe-section">
            <h1 class="subscribe-title">Subscribe to our newsletter</h1>
            <div class="subscribe-input-container">
                <div class="grid grid-cols-3 grid-rows-1 gap-0">
                    <div class="email-container">
                        <input
                            type="email"
                            placeholder="Email"
                            required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                        />
                    </div>

                    <div class="topics-container">
                        <select name="topics" id="topics" required>
                            <option value="" disabled selected>
                                What you`d like to receive
                            </option>
                            <option value="research">Research</option>
                            <option value="market">Market Analysis</option>
                            <option value="trends">Industry Trends</option>
                        </select>
                    </div>

                    <div class="subscribe-button-container">
                        <button id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </section>

        <!--Contact us section-->
        <section class="contact-us-section">
            <div class="contact-us-header-container">
                <h1>Contact Us</h1>
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
                <button id="send-message-button">Send Message</button>
            </div>
        </section>
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
            &copy; 2024 Your Company. All rights reserved.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.15.1/build/ol.js"></script>
<script src="{{ asset('') }}js/listings.js"></script>
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Go to top">
    <i class="fas fa-arrow-up"></i>
</button>
</body>
</html>
