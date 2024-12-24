<!--Contact us section-->
<section class="contact-us-section">
    <div class="contact-us-header-container">
        <h1 class="contact-us-title uppercase">Contact Us</h1>
        <div class="contact-right-content">
            <div class="social-links-container">
                <button>
                    <img src="{{ asset('assets/img') }}/common/facebook.svg" alt="Facebook" />
                </button>
                <button>
                    <img src="{{ asset('assets/img') }}/common/vk.svg" alt="Vk" />
                </button>
                <button>
                    <img src="{{ asset('assets/img') }}/common/emailicon.svg" alt="Email" />
                </button>
                <button>
                    <img src="{{ asset('assets/img') }}/common/x.svg" alt="Twitter" />
                </button>
            </div>
            <div class="phone-container">
                <img src="{{ asset('assets/img') }}/common/phoneicon.svg" alt="Phone" />
                +7 (972) 928-30-12
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
