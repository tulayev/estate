<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Club</title>
    <link rel="stylesheet" href="{{ asset('') }}css/style.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/club.css" />
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

<main class="bg-gray-100">
    <!-- Hero Section -->
    <section class="about-section">
        <div class="about-section-inside-wrapper">
            <div class="about-header">
                <h2>Insider club</h2>
            </div>

            <div class="content-wrapper">
                <div class="text-left">
                    <p1>Are you ready to be part of something extraordinary?</p1>

                    <p2>
                        Welcome to the Insider’s Club, where the future of Phuket’s real
                        estate isn’t just forecasted — it’s shaped.
                    </p2>
                </div>
            </div>

            <div class="hero-tags">
                <a class="hero-tag rounded-background"> Clear </a>
                <a class="hero-tag"> Reliable </a>
                <a class="hero-tag"> Exclusive </a>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="search-header">
            <div class="search-container">
                <div class="search-input-wrapper">
                    <input type="text" placeholder="SEARCH" class="search-input" />
                    <button class="circle-button filter-btn">
                        <img src="{{ asset('') }}assets/common/filter.svg" alt="Filter" />
                    </button>
                    <button class="circle-button search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- What is insider club -->
    <section class="what-is-insider-club">
        <div class="general-header-container">
            <h1>What is Insider Club?</h1>
            <div class="apply-to-join">
                <button id="apply-to-join-button-insider">Apply to join</button>
            </div>
        </div>
    </section>

    <!--For investors section-->
    <section class="for-whom">
        <div class="for-whom-photo investors"></div>
        <div class="for-whom-container">
            <div class="for-whom-header-container">
                <h1 class="for-whom-header">For investors</h1>
            </div>

            <p class="for-whom-description">
                Tired of being the last to know and the last to act? The Insider’s
                Club changes the game. Here, you’re not just ahead of the curve—you
                define it. From exclusive first looks to VIP site tours, we offer
                privileges that turn market insights into your competitive edge.
                Ready to shift from observer to leader?
            </p>
        </div>
    </section>

    <!--For developers section-->
    <section class="for-whom">
        <div class="for-whom-photo developers"></div>
        <div class="for-whom-container">
            <div class="for-whom-header-container">
                <h1 class="for-whom-header">For developers</h1>
            </div>

            <p class="for-whom-description">
                Picture your vision connecting with its ideal audience before
                construction even begins. The Insider’s Club isn’t just a platform;
                it’s a community—a direct pathway to buyers who understand your
                vision. We’re not just finding customers; we’re building advocates.
                Are you ready to stop selling and start inspiring?
            </p>
        </div>
    </section>

    <!-- Why partner with us-->
    <section class="why-partner-with-us">
        <div class="general-header-container">
            <h1>Why partner with us?</h1>
            <div class="apply-to-join">
                <button id="apply-to-join-button-partner">Apply to join</button>
            </div>
        </div>
    </section>

    <!-- Insights-->
    <section class="insights">
        <div class="insights-container">
            <div class="insights-header-container">
                <h1 class="insights-header">Insights</h1>
                <button class="expand-btn">+</button>
            </div>

            <p class="insights-description hidden">
                Gain unrivaled market insights specifically tailored to buyer
                demographics, enabling developers to make informed decisions that
                align with market demand. Access to a network of committed
                investors who are actively interested in Phuket’s off-plan real
                estate, positioning your project in front of the right audience from
                the start.
            </p>
        </div>
    </section>

    <!-- Project elevation-->
    <section class="insights">
        <div class="insights-container">
            <div class="insights-header-container">
                <h1 class="insights-header">Project elevation</h1>
                <button class="expand-btn">+</button>
            </div>

            <p class="insights-description hidden">
                Gain unrivaled market insights specifically tailored to buyer
                demographics, enabling developers to make informed decisions that
                align with market demand. Access to a network of committed
                investors who are actively interested in Phuket’s off-plan real
                estate, positioning your project in front of the right audience from
                the start.
            </p>
        </div>
    </section>

    <!--Entry criteria section-->
    <section class="entry-criteria">
        <div class="general-header-container">
            <h1>Entry criteria</h1>
            <div class="apply-to-join">
                <button id="apply-to-join-button-entry">Apply to join</button>
            </div>
        </div>
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
<script src="{{ asset('') }}js/club.js"></script>
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
