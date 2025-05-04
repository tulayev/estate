@php
use App\Helpers\Enums\TopicType;
@endphp

<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            {{ __('club/club.title') }}
        </h2>
        <button class="primary-button" onclick="document.getElementById('contactSection').scrollIntoView({behavior: 'smooth'})">
            {{ __('club/club.action_1') }}
        </button>
    </div>

    <div class="container mt-4 sm:mt-8 md:mt-12 lg:mt-16 xl:mt-32">
        <!-- For investors -->
        <div
            class="relative bg-cover bg-center bg-no-repeat border-rounded text-white flex"
            style="background-image: url('{{ asset('assets/images/club/what-is-bg.png') }}')"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-to-t from-black to-black/70"></div>
            <div class="relative p-6 w-full xl:w-1/2">
                <div>
                    <h2 class="font-bold text-white uppercase text-lg xl:text-4xl">
                        {{ TopicType::FOR_INVESTORS->label() }}
                    </h2>
                    <p class="mt-4 text-white text-sm sm:text-base md:text-lg xl:text-xl xlWide:text-2xl italic text-balance">
                        {!! __('club/club.for_investors_desc') !!}
                    </p>
                </div>
            </div>
            <img
                src="{{ asset('assets/images/club/team.png') }}"
                alt="Team"
                class="absolute w-1/2 right-0 bottom-0 hidden lg:block"
            />
        </div>
        <!-- For developers -->
        <div
            class="relative bg-cover bg-center bg-no-repeat border-rounded text-white flex justify-end mt-4 md:mt-8 xl:mt-16"
            style="background-image: url('{{ asset('assets/images/club/what-is-bg.png') }}')"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-to-t from-black to-black/70"></div>
            <div class="relative p-6 w-full xl:w-1/2">
                <div>
                    <h2 class="font-bold text-white uppercase text-lg xl:text-4xl">
                        {{ TopicType::FOR_DEVELOPERS->label() }}
                    </h2>
                    <p class="mt-4 text-white text-sm sm:text-base md:text-lg xl:text-xl xlWide:text-2xl italic text-balance">
                        {!! __('club/club.for_developers_desc') !!}
                    </p>
                </div>
            </div>
            <img
                src="{{ asset('assets/images/club/team-dev.png') }}"
                alt="Team"
                class="absolute w-1/2 left-0 bottom-0 hidden lg:block"
            />
        </div>
    </div>
</section>
