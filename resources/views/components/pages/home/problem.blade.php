@php
use App\Helpers\Enums\TopicType;
@endphp

@props([
    'types' => null,
])

<section class="section">
    <div class="container">
        <!-- Slider -->
        <div
            class="border-rounded relative px-5 sm:px-10 xl:px-20 py-5 sm:py-10 md:py-20 lg:py-30 xl:py-32 xxl:py-60"
            style="background-image: url('{{ asset('assets/images/problem_main_bg.png') }}')"
        >
            <div class="absolute border-rounded inset-0 bg-black opacity-70"></div>
            <div class="relative z-10">
                <h2 class="section-title-white text-lg sm:text-2xl xl:text-5xl">
                    {{ __('home/problem.title') }}
                </h2>
                <p class="text-white text-sm lg:text-base xl:text-2xl mt-4 sm:mt-5 lg:mt-10 xl:mt-20">
                    {{ __('home/problem.p_1') }}
                </p>
                <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-x-4 mt-4 sm:mt-8 lg:mt-10 xl:mt-20">
                    <p class="text-white font-bold text-xs xl:text-xl">{{ __('home/problem.p_2') }}</p>
                    <a href="{{ route('pages.insight.index', ['type' => TopicType::FOR_INVESTORS->value]) }}" class="primary-button text-xs xl:text-lg">
                        {{ TopicType::FOR_INVESTORS->label() }}
                    </a>
                    <a href="{{ route('pages.insight.index', ['type' => TopicType::FOR_DEVELOPERS->value]) }}" class="primary-button text-xs xl:text-lg">
                        {{ TopicType::FOR_DEVELOPERS->label() }}
                    </a>
                </div>
            </div>
        </div>
        <!-- Cards -->
        @if ($types)
            <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m mt-5 xl:mt-10" uk-grid>
                @php
                $typeImages = [
                      asset('assets/images/primary_bg.png'),
                      asset('assets/images/resale_bg.png'),
                      asset('assets/images/land_bg.png'),
                      asset('assets/images/land_bg.png'),
                      asset('assets/images/land_bg.png'),
                ];
                $i = 0;
                @endphp
                @foreach($types as $type)
                    <div>
                        <a
                            href="{{ route('pages.listing.index', ['type' => $type->id]) }}"
                            class="group"
                        >
                            <div class="relative">
                                <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                                <img
                                    class="w-full h-full transition-transform duration-300 ease-in-out transform group-hover:scale-110"
                                    src="{{ $typeImages[$i++] }}"
                                    alt="{{ $type->name }}"
                                />
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                    <h4 class="text-2xl text-white font-bold uppercase group-hover:text-primary">
                                        {{ $type->name }}
                                    </h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
