@props([
    'similarHotels' => null,
    'hotel' => null,
])

@if ($hotel)
    <section
        class="section"
        x-data="similarSubscribe()"
    >
        <div class="container">
            <div
                class="flex items-center justify-between"
                x-init="init()"
            >
                <h2 class="section-title">
                    {{ __('listing/show/similar.title') }}
                </h2>

                <button
                    class="primary-button"
                    x-show="!subscribed"
                    @click="step='email'"
                    uk-toggle="target: #subscriptionModal"
                >
                    {{ __('listing/show/similar.button') }}
                </button>
                <button
                    class="primary-button"
                    x-show="subscribed"
                    @click="unsubscribe()"
                >
                    Unsubscribe
                </button>
            </div>
        </div>

        <div class="swiper card-slider p-2 mt-6 md:mt-12 xl:mt-24">
            <div class="swiper-wrapper">
                @foreach($similarHotels as $similarHotel)
                    <div class="swiper-slide">
                        <x-pages.listing.show.similar-listing-view.card
                            :hotel="$similarHotel"
                        />
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Subscription Modal -->
        <div
            id="subscriptionModal"
            uk-modal
        >
            <div class="uk-modal-dialog uk-margin-auto-vertical p-6 bg-white border-rounded shadow-card w-fit max-w-md">
                <h3 class="modal-subtitle mb-4">
                    {{ __('listing/show/similar.button') }}
                </h3>

                <!-- STEP 1: enter email -->
                <div x-show="step === 'email'">
                    <label class="collapse-title-object-description mb-2">
                        Email
                        <input
                            type="email"
                            x-model="email"
                            class="mt-1 block w-full border border-primary border-rounded px-3 py-2"
                            placeholder="you@example.com"
                        />
                    </label>
                    <p x-text="errors.email" class="text-red-600 text-sm mb-4"></p>

                    <div class="flex justify-end">
                        <button
                            class="primary-button"
                            @click="sendCode()"
                            :disabled="loading"
                            x-show="!loading"
                        >
                            Get code
                        </button>
                        <div x-show="loading" uk-spinner></div>
                    </div>
                </div>

                <!-- STEP 2: enter code -->
                <div x-show="step === 'verify'">
                    <label class="collapse-title-object-description mb-2">
                        Verification code
                        <input
                            type="text"
                            x-model="code"
                            class="mt-1 block w-full border border-primary border-rounded px-3 py-2"
                            placeholder="123456"
                        />
                    </label>
                    <p x-text="errors.code" class="text-red-600 text-sm mb-4"></p>

                    <div class="flex justify-between">
                        <button
                            class="text-secondary underline"
                            @click="step='email'"
                        >
                            Back
                        </button>

                        <button
                            class="primary-button"
                            @click="verifyCode()"
                            :disabled="loading"
                            x-show="!loading"
                        >
                            Verify
                        </button>
                        <div x-show="loading" uk-spinner></div>
                    </div>
                </div>

                <!-- STEP 3: subscribed -->
                <div x-show="step === 'done'">
                    <p class="text-green-600 mb-4">
                        Success
                    </p>
                    <div class="flex justify-end">
                        <button class="uk-modal-close primary-button">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script defer>
        function similarSubscribe() {
            return {
                step: 'email',
                email: '',
                code: '',
                errors: {},
                loading: false,
                subscribed: false,
                subscribeUrl: '{{ route('subscribe.hotel', $hotel->id) }}',
                verifyUrl: '{{ route('subscription.verify') }}',
                unsubscribeUrl: '',

                init() {
                    document.addEventListener('DOMContentLoaded', () => {
                        this.checkSubscriptionStatus();
                    });
                },

                unsubscribe() {
                    window.location.href = this.unsubscribeUrl;
                },

                async checkSubscriptionStatus() {
                    try {
                        const response = await fetch('{{ route('subscription.status', $hotel->id) }}', {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                            },
                        });

                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }

                        const data = await response.json();
                        this.subscribed = data.subscribed;
                        this.unsubscribeUrl = data.unsubscribe_url;
                    }
                    catch (e) {
                        console.error(e);
                    }
                },

                // Send or resend the verification code
                async sendCode() {
                    this.errors = {};

                    if (! this.email) {
                        this.errors.email = 'Email is required';
                        return;
                    }

                    this.loading = true;

                    try {
                        const response = await fetch(this.subscribeUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify({ email: this.email }),
                        });

                        if (response.status === 202) {
                            this.step = 'verify';
                        } else if (response.status === 200) {
                            await this.checkSubscriptionStatus();
                            this.step = 'done';
                        } else {
                            throw response;
                        }
                    } catch (error) {
                        let statusCode, responseData;
                        try {
                            statusCode = error.status;
                            responseData = await error.json();
                        } catch {
                            this.errors.email = 'Unexpected error';
                            return;
                        }

                        switch (statusCode) {
                            case 422:
                                this.errors = responseData.errors || { email: responseData.message };
                                break;
                            case 409:
                                this.step = 'done';
                                break;
                            default:
                                this.errors.email = responseData.message || 'Unexpected error';
                                break;
                        }
                    }
                    finally {
                        this.loading = false;
                    }
                },

                // Verify the code, then subscribe
                async verifyCode() {
                    this.errors = {};

                    if (!this.code) {
                        this.errors.code = 'Code is required';
                        return;
                    }

                    this.loading = true;

                    try {
                        // First, verify the subscriber
                        await fetch(this.verifyUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({
                                email: this.email,
                                code: this.code,
                            }),
                        });

                        // Now that they're verified, hit subscribe again to actually create the subscription
                        await fetch(this.subscribeUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({ email: this.email }),
                        });

                        await this.checkSubscriptionStatus();
                        this.step = 'done';
                    }
                    catch (e) {
                        if (e.response?.status === 422 || e.response?.status === 410) {
                            this.errors.code = e.response.data.message;
                        }
                        else {
                            this.errors.code = 'Unexpected error';
                        }
                    }
                    finally {
                        this.loading = false;
                    }
                },
            }
        }
    </script>
@endif
