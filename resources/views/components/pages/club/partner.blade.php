<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            {{ __('club/partner.title') }}
        </h2>
        <button class="primary-button" onclick="document.getElementById('contactSection').scrollIntoView({behavior: 'smooth'})">
            {{ __('club/partner.action_1') }}
        </button>
    </div>

    <div class="container mt-4 sm:mt-8 md:mt-12 lg:mt-16 xl:mt-32">
        <!-- Insights -->
        <div
            x-data="{ expanded: false }"
            class="relative bg-cover bg-center bg-no-repeat border-rounded text-white"
            style="background-image: url('{{ asset('assets/images/club/insights-bg.png') }}')"
        >
            <div class="absolute border-rounded inset-0 bg-black bg-opacity-10"></div>
            <div class="relative p-4 sm:p-6 lg:px-8 lg:py-4 xl:px-16 xl:py-8">
                <h2 
                    class="section-title text-[#f4f4f4] cursor-pointer"
                    @click="expanded = !expanded"
                >
                    {{ __('club/partner.insights') }}
                </h2>
                <p 
                    x-show="expanded" 
                    class="mt-4 text-white text-base md:text-md lg:text-lg xl:text-2xl"
                >
                    {!! __('club/partner.insights_desc') !!}
                </p>
            </div>
        </div>
        <!-- Project elevation -->
        <div
            x-data="{ expanded: false }"
            class="relative bg-cover bg-center bg-no-repeat border-rounded text-white mt-4 md:mt-8 xl:mt-16"
            style="background-image: url('{{ asset('assets/images/club/prj-elevation-bg.jpg') }}')"
        >
            <div class="absolute border-rounded inset-0 bg-black bg-opacity-80"></div>
            <div class="relative p-4 sm:p-6 lg:px-8 lg:py-4 xl:px-16 xl:py-8">
                <h2 
                    class="section-title text-[#f4f4f4] cursor-pointer"
                    @click="expanded = !expanded"
                >
                    {{ __('club/partner.project_elevation') }}
                </h2>
                <p 
                    x-show="expanded" 
                    class="mt-4 text-white text-base md:text-md lg:text-lg xl:text-2xl"
                >
                    {!! __('club/partner.project_elevation_desc') !!}
                </p>
            </div>
        </div>
    </div>
</section>
