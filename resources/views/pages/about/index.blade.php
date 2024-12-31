<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('') }}css/style.css" />
    <link rel="stylesheet" href="{{ asset('') }}css/about.css" />
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

<main class="bg-gray-200">
    <section class="about-section">
        <div class="about-header">
            <h2>About Us</h2>
        </div>
        <div class="about-content">
            <div class="content-wrapper">
                <p class="text-left">
                    Buying a property with the intent to sell it later—whether in the
                    short or long term— requires strategic planning and market
                    insight. At <em>Ignatev Estate</em>, we specialize in identifying
                    properties that are not only great investments now but will also
                    be in demand when you're ready to sell.
                </p>
            </div>
        </div>
        <div class="contact-links">
            <a href="tel:+79729283012" class="contact-link rounded-background">
                <img
                    src="{{ asset('') }}assets/aboutmobile.svg"
                    alt="Phone"
                    class="contact-icon"
                />
                +7 (972) 928-30-12
            </a>
            <a
                href="https://facebook.com/1stategroup"
                target="_blank"
                class="contact-link"
            >
                <img
                    src="{{ asset('') }}assets/aboutfb.svg"
                    alt="Facebook"
                    class="contact-icon"
                />
                1stategroup
            </a>
            <a
                href="https://wa.me/1stategroup"
                target="_blank"
                class="contact-link"
            >
                <img
                    src="{{ asset('') }}assets/aboutwhatsapp.svg"
                    alt="WhatsApp"
                    class="contact-icon"
                />
                1stategroup
            </a>
        </div>
    </section>

    <div class="about-us">
        <div id="map-to-us" class="object-cover"></div>
        <div class="location-section">
            <h1 class="flex items-center">
                <img src="{{ asset('') }}assets/common/logo.svg" alt="Ignatev Estate Logo" />
                <div class="location-name">IGNATEV ESTATE</div>
            </h1>
            <p class="desc-us-addr text-gray-700 max-w-[75ch]">
                📍 Plaza Del Mar, No. 1 Pasak-Koktanod Rd, Cherngtalay, Thalang,
                Phuket 83110 <br />
            </p>
            <p class="desc-us-tax text-gray-700 max-w-[75ch]">
                🔖 Tax Number: 0835566023587
            </p>
        </div>
    </div>
    <h2 class="about-title">About ignatev estate</h2>
    <div class="about-experience">
        <section class="centered-boxes">
            <div class="box">
                <div class="number-container">
                    <div class="number">15</div>
                    <div class="word">years</div>
                </div>
                <div class="text p-4">
                    Our journey with Phuket’s off-plan real estate market began in
                    2017, not as service providers, but as investors. Despite the
                    market’s growth potential, we quickly discovered significant flaws
                    that made navigating this landscape challenging. Overpriced
                    properties, hidden gems lost in the noise, and a lack of
                    transparent, reliable information were just a few of the obstacles
                    we encountered. As investors ourselves, we felt the pressing need
                    for a more structured, transparent data-driven approach to
                    off-plan investment.
                </div>
            </div>
        </section>

        <section class="centered-boxes">
            <div class="box">
                <div class="number-container">
                    <div class="number">2017</div>
                </div>
                <div class="text p-4">
                    Our journey with Phuket’s off-plan real estate market began in
                    2017, not as service providers, but as investors. Despite the
                    market’s growth potential, we quickly discovered significant flaws
                    that made navigating this landscape challenging. Overpriced
                    properties, hidden gems lost in the noise, and a lack of
                    transparent, reliable information were just a few of the obstacles
                    we encountered. As investors ourselves, we felt the pressing need
                    for a more structured, transparent data-driven approach to
                    off-plan investment.
                </div>
            </div>
        </section>

        <section class="centered-boxes">
            <div class="box">
                <div class="number-container">
                    <div class="number">2023</div>
                </div>
                <div class="text p-4">
                    Our journey with Phuket’s off-plan real estate market began in
                    2017, not as service providers, but as investors. Despite the
                    market’s growth potential, we quickly discovered significant flaws
                    that made navigating this landscape challenging. Overpriced
                    properties, hidden gems lost in the noise, and a lack of
                    transparent, reliable information were just a few of the obstacles
                    we encountered. As investors ourselves, we felt the pressing need
                    for a more structured, transparent data-driven approach to
                    off-plan investment.
                </div>
            </div>
        </section>

        <section class="experience-text">
            <p>
                A key aspect of our growth has been attracting some of the strongest
                professionals in the real estate industry – individuals who are
                brands in their own right. By combining our investor-centric
                approach with their deep industry knowledge, we’ve created a unique
                synergy. At Ignatev Estate, you’re not just working with a company;
                you’re partnering with a team of recognized experts who understand
                the market from multiple perspectives.<br />
                Together, we’re not just navigating the off-plan real estate market;
                we’re reshaping it, bringing clarity, confidence, and strategic
                insight to every investment decision.
            </p>
        </section>
    </div>

    <section class="our-focus">
        <h1 class="focus-title">Our Focus is Off-Plan Investments</h1>
        <p class="focus-description">
            Off-plan real estate investment involves purchasing properties before
            construction is complete, based on architectural plans and renderings.
        </p>
    </section>

    <section class="strategy-offers">
        <h1 class="strategy-title">
            This strategy offers several potential benefits:
        </h1>
        <div class="benefits-container flex grid-col-4 gap-4">
            <div class="higher-grains">
                📈
                <span class="text-wrap">Higher gains</span>
            </div>
            <div class="lower-initial-cost">
                💵
                <span>Lower initial costs</span>
            </div>
            <div class="early-property-selection">
                ⌛️
                <span>Early property selection</span>
            </div>
            <div class="flexible-payment">
                🗓
                <span>Flexible payment</span>
            </div>
        </div>
        <div class="strategy-headsup">
            <p class="strategy-headsup-icon">❗</p>
            <p class="strategy-headsup-description">
                However, it’s crucial to understand that off-plan investment isn’t
                without challenges. Investors must consider construction risks such
                as delays or plan changes, potential market fluctuations during the
                build period, and the critical importance of developer reliability.
            </p>
        </div>
        <p class="strategy-description">
            Success in off-plan investment requires a specific investor profile
            and a strategic approach. It’s best suited for those with higher risk
            tolerance, the ability to commit capital for extended periods, and
            comfort with less liquid investments. Key strategies for success
            include conducting thorough market research to understand local trends
            and future development plans, rigorous vetting of developers’ track
            records and financial health, careful review of all legal obligations,
            and strategic planning for exit strategies, whether through resale or
            rental.
        </p>
    </section>

    <div class="leader-header-container">
        <h1>Our Leadership Team</h1>
        <div class="leader-contact-list">
            <button id="contact-us-button">Contact Us</button>
        </div>
    </div>

    <section class="leader-team">
        <div class="leader-photo ceo"></div>
        <div class="leader-team-container">
            <div class="leader-name-pos-container">
                <h1 class="leader-team-name">Pavel Ignatev</h1>
                <span class="leader-team-position">CEO</span>
            </div>

            <p class="leader-team-description">
                My experience highlights include top senior positions at global
                powerhouses including Ernst & Young (EY), Ancor International Group,
                ICM Asset Management, AV Group, Federal level high stakes investment
                projects, an extensive background in private equity-backed
                investments, and leading PMO's.
            </p>

            <div class="leader-contact-list">
                <a
                    href="mailto:adress@gmail.com"
                    class="contact-link rounded-background"
                >
                    <img
                        src="{{ asset('') }}assets/aboutus/mail.svg"
                        alt="Email"
                        class="contact-icon"
                    />
                    adress@gmail.com
                </a>
                <a
                    href="https://facebook.com/1stategroup"
                    target="_blank"
                    class="contact-link"
                >
                    <img
                        src="{{ asset('') }}assets/aboutfb.svg"
                        alt="Facebook"
                        class="contact-icon"
                    />
                    1stategroup
                </a>
                <a
                    href="https://wa.me/1stategroup"
                    target="_blank"
                    class="contact-link"
                >
                    <img
                        src="{{ asset('') }}assets/aboutwhatsapp.svg"
                        alt="WhatsApp"
                        class="contact-icon"
                    />
                    1stategroup
                </a>
            </div>
        </div>
    </section>
    <section class="leader-intro">
        <div class="leader-intro-container">
            <h1>👋 Hello, I’m Pavel, Founder and CEO of Ignatev Estate.</h1>
            <p>
            <span
            >— My journey in real estate and finance, rooted in M&A execution
              and competitive strategy development at leading international
              companies, has led me to create something unique here in Phuket.
              At Ignatev Estate, we apply the rigor of private equity due
              diligence to off-plan property investments. Leveraging my
              experience in corporate and regional strategy, along with a keen
              market awareness, I've developed an approach and business model
              that clearly sets us apart in the local real estate market. We
              don't just look at properties; we analyze market dynamics,
              identify competitive advantages, and assess risks with the
              precision I've cultivated through years of high-stakes corporate
              strategy work. Our comprehensive view allows us to offer insights
              that go beyond the typical real estate transaction.</span
            >
                <span class="hidden-content"
                ><br />— My background has taught me that even great developers
              can have suboptimal projects, while lesser-known developers might
              have hidden gems. That's why we assess every opportunity
              individually, providing you with clarity as an investor and true
              visibility for real estate developers. One of my proudest
              achievements is our robust method for assessing off-plan property
              investments, which draws on my experience in M&A execution and
              market analysis. We are changing the game in our industry,
              providing a level of clarity and confidence that wasn't available
              before.</span
                >
            </p>
            <button id="show-more-button">Show More</button>
        </div>
    </section>

    <section class="leader-team">
        <div class="leader-photo exec"></div>
        <div class="leader-team-container">
            <div class="leader-name-pos-container">
                <h1 class="leader-team-name">Jurgen Birnbaum (Jay)</h1>
                <span class="leader-team-position">Executive Director</span>
            </div>

            <p class="leader-team-description">
                My experience highlights include 15+ years of direct experience in
                Phuket’s real estate market, an extensive background as an
                investment banker with a global giant UniCredit Bank, and a strong
                foundation in finance, international markets, and business
                administration... show more
            </p>

            <div class="leader-contact-list">
                <a
                    href="mailto:adress@gmail.com"
                    class="contact-link rounded-background"
                >
                    <img
                        src="{{ asset('') }}assets/aboutus/mail.svg"
                        alt="Email"
                        class="contact-icon"
                    />
                    adress@gmail.com
                </a>
                <a
                    href="https://facebook.com/1stategroup"
                    target="_blank"
                    class="contact-link"
                >
                    <img
                        src="{{ asset('') }}assets/aboutfb.svg"
                        alt="Facebook"
                        class="contact-icon"
                    />
                    1stategroup
                </a>
                <a
                    href="https://wa.me/1stategroup"
                    target="_blank"
                    class="contact-link"
                >
                    <img
                        src="{{ asset('') }}assets/aboutwhatsapp.svg"
                        alt="WhatsApp"
                        class="contact-icon"
                    />
                    1stategroup
                </a>
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
<script src="{{ asset('') }}js/about.js"></script>
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Go to top">
    <i class="fas fa-arrow-up"></i>
</button>
</body>
</html>

