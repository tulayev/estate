<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title">
            {{ __('home/discuss.title') }}
        </h2>
        <button class="primary-button" onclick="document.getElementById('contactSection').scrollIntoView({behavior: 'smooth'})">
            {{ __('home/discuss.action_1') }}
        </button>
    </div>

    <div class="container pt-6 md:pt-12 xl:pt-24">
        <div
            class="border-rounded bg-no-repeat p-4 md:p-8 xl:p-10"
            style="background-image: url('{{ asset('assets/images/discuss.png') }}')"
        >
            <p class="text-white uppercase text-md ">
                {!! __('home/discuss.p_1') !!}
            </p>
        </div>
    </div>
</section>
