@php
use App\Helpers\Enums\TopicType;
@endphp

<section class="section">
    <div class="container">
        <!-- Slider -->
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div
                        class="flex border-rounded relative px-5 sm:px-10 xl:px-20 h-[500px] sm:h-[500px] md:h-[600px] xl:h-[800px] xxl:h-[850px]"
                        style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
                    >
                        <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
                        <div class="relative z-10 flex flex-col justify-center">
                            <h2 class="section-title-white text-lg sm:text-2xl xl:text-3xl">
                                {{ __('home/problem.slide_1_h2') }}
                            </h2>
                            <p class="text-white text-sm lg:text-base xl:text-xl mt-4 sm:mt-5 lg:mt-5">
                                {!! __('home/problem.slide_1_p') !!}
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
                <div class="swiper-slide">
                    <div
                        class="flex border-rounded relative px-5 sm:px-10 xl:px-20 h-[500px] sm:h-[500px] md:h-[600px] xl:h-[800px] xxl:h-[850px]"
                        style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
                    >
                        <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
                        <div class="relative z-10 flex flex-col justify-center">
                            <h2 class="section-title-white text-lg sm:text-2xl xl:text-3xl">
                                {{ __('home/problem.slide_2_h2') }}
                            </h2>
                            <p class="text-white text-sm lg:text-base xl:text-xl mt-4 sm:mt-5 lg:mt-5">
                                {!! __('home/problem.slide_2_p') !!}
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
                <div class="swiper-slide">
                    <div
                        class="flex border-rounded relative px-5 sm:px-10 xl:px-20 h-[500px] sm:h-[500px] md:h-[600px] xl:h-[800px] xxl:h-[850px]"
                        style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
                    >
                        <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
                        <div class="relative z-10 flex flex-col justify-center">
                            <h2 class="section-title-white text-lg sm:text-2xl xl:text-3xl">
                                {{ __('home/problem.slide_3_h2') }}
                            </h2>
                            <p class="text-white text-sm lg:text-base xl:text-xl mt-4 sm:mt-5 lg:mt-5">
                                {!! __('home/problem.slide_3_p') !!}
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
                <div class="swiper-slide">
                    <div
                        class="flex border-rounded relative px-5 sm:px-10 xl:px-20 h-[500px] sm:h-[500px] md:h-[600px] xl:h-[800px] xxl:h-[850px]"
                        style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
                    >
                        <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
                        <div class="relative z-10 flex flex-col justify-center">
                            <h2 class="section-title-white text-lg sm:text-2xl xl:text-3xl">
                                {{ __('home/problem.slide_4_h2') }}
                            </h2>
                            <p class="text-white text-sm lg:text-base xl:text-xl mt-4 sm:mt-5 lg:mt-5">
                                {!! __('home/problem.slide_4_p') !!}
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
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <!-- Cards -->
        @if ($primary && $resales && $land && $rent)
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
                <div>
                    <a
                        href="{{ route('pages.listing.index', ['type' => $rent->id]) }}"
                        class="group"
                    >
                        <div class="relative">
                            <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                            <img
                                class="w-full h-full transition-transform duration-300 ease-in-out transform group-hover:scale-110"
                                src="{{ asset('assets/images/rent.png') }}"
                                alt="{{ $rent->name }}"
                            />
                            <div class="absolute-centralize">
                                <h4 class="text-2xl text-white font-bold uppercase group-hover:text-primary">
                                    {{ $rent->name }}
                                </h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>
