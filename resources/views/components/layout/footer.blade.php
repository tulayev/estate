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
                    <img src="{{ asset('assets/img') }}/common/white-social1.svg" alt="Facebook" />
                </button>
                <button>
                    <img src="{{ asset('assets/img') }}/common/white-social2.svg" alt="Vk" />
                </button>
                <button>
                    <img src="{{ asset('assets/img') }}/common/white-social3.svg" alt="Email" />
                </button>
                <button>
                    <img src="{{ asset('assets/img') }}/common/white-social4.svg" alt="Twitter" />
                </button>
            </div>
            <div class="phone-container">
                <img src="{{ asset('assets/img') }}/common/white-phone.svg" alt="Phone" />
                +7 (972) 928-30-12
            </div>
        </div>

        <!-- Footer Bottom Text -->
        <div class="footer-bottom">
            &copy;
            {{ date('Y') }}
            Ignatev Estate. All rights reserved.
        </div>
    </div>
</footer>

<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Go to top">
    <img
        src="{{ asset('assets/img') }}/home/scroll.svg"
        alt="Arrow up"
        width="20"
        height="20"
    />
</button>
