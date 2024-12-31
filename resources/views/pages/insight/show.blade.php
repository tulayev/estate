<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Topic</title>
    <link rel="stylesheet" href="{{ asset('') }}css/style.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/topic.css" />
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
            <h1 class="topic-tag">Research | topics</h1>
            <div class="about-header">
                <h2>the main topic</h2>
                <span class="time-read">~7min</span>
            </div>

            <div class="content-wrapper">
                <div class="text-left">
                    <p1
                    >Buying a property with the intent to sell it later—whether in
                        the short or long term—requires strategic planning and market
                        insight. At <b>Ignatev Estate</b>, we specialize in identifying
                        properties that are not only great investments now but will also
                        be in demand when you're ready to sell. Here’s how to ensure the
                        property you buy today is something you’ll be able to sell
                        tomorrow, for profit or convenience.
                    </p1>
                </div>
            </div>

            <div class="hero-tags">
                <a class="hero-tag rounded-background"> research </a>
                <a class="hero-tag"> luxury </a>
                <a class="hero-tag"> summer </a>
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

    <!--Topic title-->
    <section class="topic-title-section">
        <div class="topic-title-container">
            <h1>The first title</h1>
        </div>
        <div class="topic-content">
            <p class="first-paragraph">
                Buying a property with the intent to sell it later—whether in the
                short or long term—requires strategic planning and market insight.
                At *Ignatev Estate*, we specialize in identifying properties that
                are not only great investments now but will also be in demand when
                you're ready to sell. Here’s how to ensure the property you buy
                today is something you’ll be able to sell tomorrow, for profit or
                convenience.
            </p>
            <img src="{{ asset('') }}assets/common/bg.svg" alt="topic-image" />
            <p class="second-paragraph">
                Buying a property with the intent to sell it later—whether in the
                short or long term—requires strategic planning and market insight.
                At *Ignatev Estate*, we specialize in identifying properties that
                are not only great investments now but will also be in demand when
                you're ready to sell. Here’s how to ensure the property you buy
                today is something you’ll be able to sell tomorrow, for profit or
                convenience.
            </p>
        </div>
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

    <!--You may also like-->
    <section class="also-like">
        <div class="topic-title-container">
            <h1>You may also like</h1>
            <div class="left-topic-title-container">
                <button id="previous-button">Previous</button>
                <button id="next-button">Next</button>
            </div>
        </div>
    </section>

    @if ($similarTopics)
        <div class="topics-slider-container">
            @foreach($similarTopics as $topic)
                <a href="{{ route('pages.insight.show', ['slug' => $topic->slug]) }}">
                    <div
                        class="topic-card"
                        style="background: url('{{ ImagePathResolver::resolve($topic->image) ?? asset('assets/insights/card1.svg') }}'),linear-gradient(rgba(26, 43, 76, 0.3), rgba(40, 50, 76, 0.3)),center/cover;"
                    >
                        <div class="card-header">
                            <div class="topic-tag">{{ $topic->category->title }}</div>
                            <button class="like-btn"><i class="fas fa-heart"></i></button>
                        </div>

                        <h1 class="topic-title">
                            {{ $topic->title }} <span>~7min</span>
                        </h1>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

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
<script src="{{ asset('') }}js/topic.js"></script>
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

