@php
use App\Helpers\Enums\TopicType;
@endphp

<section class="section">
    <div class="container">
        <div id="carousel" class="relative w-full" data-carousel="slide">
            <div class="relative h-56 rounded-lg md:h-[50rem] overflow-scroll md:overflow-hidden">

                <!-- First slide -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div
                        class="flex border-rounded relative px-5 sm:px-10 xl:px-20 h-[500px] sm:h-[500px] md:h-[600px] xl:h-[800px] xxl:h-[850px]"
                        style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
                    >
                        <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
                        <div class="relative z-10 flex flex-col justify-center">
                            <h2 class="section-title-white text-lg sm:text-2xl xl:text-5xl">
                                Your Guide to Secure & Profitable Investments
                            </h2>
                            <p class="text-white text-sm lg:text-base xl:text-2xl mt-4 sm:mt-5 lg:mt-10 xl:mt-20">
                                Phuket’s real estate market is flourishing, with over 250 new developments and more than 200 developers competing for attention.
                                While the opportunities for families to build wealth and secure their future are immense, navigating this dynamic market presents unique challenges.
                                Making informed decisions amidst a sea of marketing promises requires expertise, precision, and deep local insight.
                            </p>
                            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-x-4 mt-4 sm:mt-8 lg:mt-10 xl:mt-20">
                                <p class="text-white font-bold text-xs xl:text-xl">
                                    {{ __('home/problem.p_2') }}
                                </p>
                                <a
                                    href="{{ route('pages.insight.index', ['type' => TopicType::FOR_INVESTORS->value]) }}"
                                    class="primary-button text-xs xl:text-lg"
                                >
                                    {{ TopicType::FOR_INVESTORS->label() }}
                                </a>
                                <a
                                    href="{{ route('pages.insight.index', ['type' => TopicType::FOR_DEVELOPERS->value]) }}"
                                    class="primary-button text-xs xl:text-lg"
                                >
                                    {{ TopicType::FOR_DEVELOPERS->label() }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Second slide -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div
                        class="flex border-rounded relative px-5 sm:px-10 xl:px-20 h-[500px] sm:h-[500px] md:h-[600px] xl:h-[800px] xxl:h-[850px]"
                        style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
                    >
                        <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
                        <div class="relative z-10 flex flex-col justify-center">
                            <h2 class="section-title-white text-lg sm:text-2xl xl:text-5xl">
                                In Phuket's Off-Plan Market, We Protect Your Investment & Dreams from Hidden Risks
                            </h2>
                            <p class="text-white text-sm lg:text-base xl:text-2xl mt-4 sm:mt-5 lg:mt-10 xl:mt-20">
                                In a market filled with glossy brochures and polished promises, it’s easy to dream big—but what about the risks they don’t tell you about?
                                At Ignatev Estate, we prioritize your investment security by uncovering what truly lies beneath the surface.
                            </p>
                            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-x-4 mt-4 sm:mt-8 lg:mt-10 xl:mt-20">
                                <p class="text-white font-bold text-xs xl:text-xl">
                                    {{ __('home/problem.p_2') }}
                                </p>
                                <a
                                    href="{{ route('pages.insight.index', ['type' => TopicType::FOR_INVESTORS->value]) }}"
                                    class="primary-button text-xs xl:text-lg"
                                >
                                    {{ TopicType::FOR_INVESTORS->label() }}
                                </a>
                                <a
                                    href="{{ route('pages.insight.index', ['type' => TopicType::FOR_DEVELOPERS->value]) }}"
                                    class="primary-button text-xs xl:text-lg"
                                >
                                    {{ TopicType::FOR_DEVELOPERS->label() }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Third slide -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div
                        class="flex border-rounded relative px-5 sm:px-10 xl:px-20 h-[500px] sm:h-[500px] md:h-[600px] xl:h-[800px] xxl:h-[850px]"
                        style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
                    >
                        <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
                        <div class="relative z-10 flex flex-col justify-center">
                            <h2 class="section-title-white text-lg sm:text-2xl xl:text-5xl">
                                Connect Your Project with Investors – Secure Early-Stage Finance
                            </h2>
                            <p class="text-white text-sm lg:text-base xl:text-2xl mt-4 sm:mt-5 lg:mt-10 xl:mt-20">
                                Exceptional projects deserve to be showcased to ultra-high-net-worth (UHNW) families,
                                private equity funds, and discerning investors who value substance over flashy marketing.
                            </p>
                            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-x-4 mt-4 sm:mt-8 lg:mt-10 xl:mt-20">
                                <p class="text-white font-bold text-xs xl:text-xl">
                                    {{ __('home/problem.p_2') }}
                                </p>
                                <a
                                    href="{{ route('pages.insight.index', ['type' => TopicType::FOR_INVESTORS->value]) }}"
                                    class="primary-button text-xs xl:text-lg"
                                >
                                    {{ TopicType::FOR_INVESTORS->label() }}
                                </a>
                                <a
                                    href="{{ route('pages.insight.index', ['type' => TopicType::FOR_DEVELOPERS->value]) }}"
                                    class="primary-button text-xs xl:text-lg"
                                >
                                    {{ TopicType::FOR_DEVELOPERS->label() }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fourth slide -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div
                        class="flex border-rounded relative px-5 sm:px-10 xl:px-20 h-[500px] sm:h-[500px] md:h-[600px] xl:h-[800px] xxl:h-[850px]"
                        style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
                    >
                        <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
                        <div class="relative z-10 flex flex-col justify-center">
                            <h2 class="section-title-white text-lg sm:text-2xl xl:text-5xl">
                                Our Promise
                            </h2>
                            <p class="text-white text-sm lg:text-base xl:text-2xl mt-4 sm:mt-5 lg:mt-10 xl:mt-20">
                                When we present an opportunity, it’s more than just clarity—it’s confidence, built on verified data, documented evidence, and thorough analysis.
                                For families and institutional investors, we provide the assurance needed to make sound, impactful decisions.
                            </p>
                            <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-x-4 mt-4 sm:mt-8 lg:mt-10 xl:mt-20">
                                <p class="text-white font-bold text-xs xl:text-xl">
                                    {{ __('home/problem.p_2') }}
                                </p>
                                <a
                                    href="{{ route('pages.insight.index', ['type' => TopicType::FOR_INVESTORS->value]) }}"
                                    class="primary-button text-xs xl:text-lg"
                                >
                                    {{ TopicType::FOR_INVESTORS->label() }}
                                </a>
                                <a
                                    href="{{ route('pages.insight.index', ['type' => TopicType::FOR_DEVELOPERS->value]) }}"
                                    class="primary-button text-xs xl:text-lg"
                                >
                                    {{ TopicType::FOR_DEVELOPERS->label() }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-1/2 left-0 z-30 px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 bg-gray-800/30 rounded-full group-hover:bg-gray-800/50">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </span>
            </button>
            <button type="button" class="absolute top-1/2 right-0 z-30 px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 bg-gray-800/30 rounded-full group-hover:bg-gray-800/50">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </span>
            </button>
        </div>

        <!-- Cards -->
        @if ($primary && $resales && $land)
            <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m mt-5 xl:mt-10" uk-grid>
                <div>
                    <a
                        href="{{ route('pages.listing.index', ['type' => $primary->id]) }}"
                        class="group"
                    >
                        <div class="relative">
                            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                            <img
                                class="w-full h-full transition-transform duration-300 ease-in-out transform group-hover:scale-110"
                                src="{{ asset('assets/images/primary_bg.png') }}"
                                alt="{{ $primary->name }}"
                            />
                            <div class="absolute-centralize">
                                <h4 class="text-2xl text-white font-bold uppercase group-hover:text-primary">
                                    {{ $primary->name }}
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a
                        href="{{ route('pages.listing.index', ['type' => $resales->id]) }}"
                        class="group"
                    >
                        <div class="relative">
                            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                            <img
                                class="w-full h-full transition-transform duration-300 ease-in-out transform group-hover:scale-110"
                                src="{{ asset('assets/images/resale_bg.png') }}"
                                alt="{{ $resales->name }}"
                            />
                            <div class="absolute-centralize">
                                <h4 class="text-2xl text-white font-bold uppercase group-hover:text-primary">
                                    {{ $resales->name }}
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div>
                    <a
                        href="{{ route('pages.listing.index', ['tag' => $land->id]) }}"
                        class="group"
                    >
                        <div class="relative">
                            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                            <img
                                class="w-full h-full transition-transform duration-300 ease-in-out transform group-hover:scale-110"
                                src="{{ asset('assets/images/land_bg.png') }}"
                                alt="{{ $land->name }}"
                            />
                            <div class="absolute-centralize">
                                <h4 class="text-2xl text-white font-bold uppercase group-hover:text-primary">
                                    {{ $land->name }}
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
