<section id="contactSection" class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            {{ __('general.contact_us') }}
        </h2>
        <div class="flex items-center space-x-4 uk-visible@m">
            <div class="white-button">
                <ul class="flex items-center space-x-8 h-full">
                    <li>
                        <a href="https://wa.me/66922407355">
                            <img
                                src="{{ asset('assets/images/icons/whatsapp.svg') }}"
                                alt="whatsapp"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/ignatev-estate" target="_blank">
                            <img
                                src="{{ asset('assets/images/icons/linkedin.svg') }}"
                                alt="linkedin" />
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ignatev_estate" target="_blank">
                            <img
                                src="{{ asset('assets/images/icons/instagram.svg') }}"
                                alt="instagram"
                            />
                        </a>
                    </li>

                    <li>
                        <a href="https://www.facebook.com/share/1EHwWjnqSo" target="_blank">
                            <img
                                src="{{ asset('assets/images/icons/facebook.svg') }}"
                                alt="facebook"
                            />
                        </a>
                    </li>
                    <li>
                        <a href="https://t.me/ignatevestate" target="_blank">
                            <img
                                src="{{ asset('assets/images/icons/telegram.svg') }}"
                                alt="telegram"
                            />
                        </a>
                    </li>

                    <li>
                        <a href="mailto:info@ignatev-estate.com">
                            <img
                                src="{{ asset('assets/images/icons/mail.svg') }}"
                                alt="mail"
                            />
                        </a>
                    </li>
                </ul>
            </div>
            <a
                href="tel:+7 (972) 928-30-12"
                class="white-button flex"
            >
                <img
                    src="{{ asset('assets/images/icons/phone.svg') }}"
                    alt="Phone"
                />
                <span>+66 (92) 240 7355</span>
            </a>
        </div>
    </div>

    <div class="container mt-4 sm:mt-6 md:mt-8 lg:mt-10" x-data="contactForm()">
        <!-- Success Message -->
        <div x-show="showSuccess" x-transition class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">{{ __('general.contact_success') }}</h3>
            <p>We'll get back to you as soon as possible.</p>
        </div>

        <!-- Contact Form -->
        <form x-show="!showSuccess" class="w-full relative" @submit.prevent="submitForm">
            <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s" uk-grid>
                <div>
                    <div class="form-input-anim">
                        <input
                            type="text"
                            name="name"
                            x-model="formData.name"
                            class="input w-full px-[30px] border-rounded focus:outline-none"
                            autocomplete="off"
                            required
                        />
                        <label for="name" class="label-name">
                            <span class="content-name">{{ __('general.form_name') }}</span>
                        </label>
                    </div>
                </div>
                <div>
                    <div class="form-input-anim">
                        <input
                            type="email"
                            name="email"
                            x-model="formData.email"
                            class="input w-full px-[30px] border-rounded focus:outline-none"
                            autocomplete="off"
                            required
                        />
                        <label for="email" class="label-name">
                            <span class="content-name">{{ __('general.form_email') }}</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-input-anim mt-4 textarea-wrapper">
                <textarea
                    class="input textarea w-full px-[30px] border-rounded focus:outline-none"
                    name="message"
                    x-model="formData.message"
                    rows="12"
                    autocomplete="off"
                    required
                ></textarea>
                <label for="message" class="label-name">
                    <span class="content-name">{{ __('general.form_message') }}</span>
                </label>
            </div>

            <!-- Error Message -->
            <div x-show="error" x-transition class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                <span x-text="error"></span>
            </div>

            <button 
                type="submit"
                :disabled="loading"
                class="absolute bg-primary text-white border-rounded w-full bottom-0 text-sm sm:text-base md:text-lg font-bold xl:font-black h-[60px] md:h-[80px] uppercase disabled:opacity-50"
            >
                <span x-show="!loading">{{ __('general.form_submit') }}</span>
                <span x-show="loading">Sending...</span>
            </button>
        </form>
    </div>
</section>

<script defer>
    function contactForm() {
        return {
            formData: {
                name: '',
                email: '',
                message: ''
            },
            loading: false,
            error: null,
            showSuccess: false,

            async submitForm() {
                this.loading = true;
                this.error = null;

                try {
                    const response = await fetch('{{ route('contact.submit') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify(this.formData)
                    });

                    const data = await response.json();

                    if (data.success) {
                        this.showSuccess = true;
                        this.formData = { name: '', email: '', message: '' };
                    } else {
                        this.error = data.message || '{{ __('general.contact_error') }}';
                        
                        // Show validation errors if available
                        if (data.errors) {
                            const errorMessages = Object.values(data.errors).flat();
                            this.error = errorMessages.join(' ');
                        }
                    }
                } catch (error) {
                    console.error('Contact form error:', error);
                    this.error = '{{ __('general.contact_error') }}';
                } finally {
                    this.loading = false;
                }
            }
        };
    }
</script>
