<div id="contactSection" class="uk-section">
    <div class="mini-container flex items-center justify-between  mb-10">
        <h2 class="section-title flex space-x-3">
            contact us
        </h2>
        <div class="flex items-center space-x-4">
            <div class="white-button">
                <ul class="flex items-center space-x-8 h-full">
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icons/phone.svg') }}" alt="watsup">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icons/x.svg') }}" alt="x">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icons/instagram.svg') }}" alt="instagram">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icons/youtube.svg') }}" alt="youtube">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icons/facebook.svg') }}" alt="facebook">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icons/vk.svg') }}" alt="vk">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="{{ asset('assets/images/icons/mail.svg') }}" alt="mail">
                        </a>
                    </li>
                </ul>
            </div>
            <a
                href="tel:+7 (972) 928-30-12"
                class="white-button"
            >
                +7 (972) 928-30-12
            </a>
        </div>
    </div>

    <div class="mini-container pb-24">
        <div class="mini-container">
            <form class="uk-margin-large-top w-full relative z-[4]">
                <div class="grid grid-cols-2 gap-x-4 w-full">
                    <div class="form-input-anim">
                        <input
                            type="text"
                            name="text"
                            class="input w-full px-[30px] rounded-[28px] focus:outline-none"
                            autocomplete="off"
                            required
                        />
                        <label for="text" class="label-name">
                            <span class="content-name"> Enter your name </span>
                        </label>
                    </div>

                    <div class="form-input-anim">
                        <input
                            type="text"
                            name="text"
                            class="input w-full px-[30px] rounded-[28px] focus:outline-none"
                            autocomplete="off"
                            required
                        />
                        <label for="text" class="label-name">
                            <span class="content-name"> Enter your number </span>
                        </label>
                    </div>
                </div>

                <div class="form-input-anim mt-4 textarea-wrapper">
                    <textarea
                        class="input textarea w-full px-[30px] rounded-[28px] focus:outline-none"
                        name="text"
                        rows="12"
                        autocomplete="off"
                        required
                    ></textarea>
                    <label for="text" class="label-name">
                        <span class="content-name"> Message </span>
                    </label>
                </div>
                <button class="absolute bg-[#0F1F3D] h-[80px] text-white rounded-[28px] w-full text-xl font-bold bottom-0 third-btn">Send</button>
            </form>
        </div>
    </div>
</div>
