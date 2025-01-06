<div class="uk-section">
    <div class="mini-container flex items-center justify-between  mb-10">
        <h2 class="section-title flex space-x-3">
            contact us
        </h2>
        <div class="flex items-center space-x-4">
            <div class="custom-btn-white">
                <ul class="flex items-center space-x-8 h-full">
                    <li>
                        <a href="">
                            <img src="{{ asset('') }}assets/images/contact/phone.svg" alt="watsup">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('') }}assets/images/contact/x.svg" alt="x">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('') }}assets/images/contact/instagram.svg" alt="instagram">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('') }}assets/images/contact/youtube.svg" alt="youtube">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('') }}assets/images/contact/facebook.svg" alt="facebook">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('') }}assets/images/contact/vkicon.svg" alt="vkicon">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="{{ asset('') }}assets/images/contact/mail.svg" alt="mail">
                        </a>
                    </li>
                </ul>
            </div>
            <button class="custom-btn-white">
                +7 (972) 928-30-12
            </button>
        </div>
    </div>

    <div class="mini-container pb-24">
        <div class="mini-container">
            <form class="uk-margin-large-top w-full relative z-[4]">


                <div class="grid grid-cols-2 gap-x-4 w-full">
                    <div class="form-input-anim">
                        <input type="text" name="text" autocomplete="off" required
                               class="input w-full px-[30px] rounded-[28px] focus:outline-none" />
                        <label for="text" class="label-name">
                            <span class="content-name"> Enter your name </span>
                        </label>
                    </div>

                    <div class="form-input-anim">
                        <input type="text" name="text" autocomplete="off" required
                               class="input w-full px-[30px] rounded-[28px] focus:outline-none" />
                        <label for="text" class="label-name">
                            <span class="content-name"> Enter your number </span>
                        </label>
                    </div>
                </div>

                <div class="form-input-anim mt-4 textarea-wrapper">
            <textarea name="text" rows="12" autocomplete="off" required
                      class="input textarea w-full px-[30px] rounded-[28px] focus:outline-none"></textarea>
                    <label for="text" class="label-name">
                        <span class="content-name"> Message </span>
                    </label>
                </div>

                <button
                    class="absolute bg-[#0F1F3D] h-[80px] text-white rounded-[28px] w-full text-xl font-bold bottom-0 third-btn">Send</button>
            </form>
        </div>
    </div>
</div>
