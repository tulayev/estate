<section class="section">
    <div class="container flex items-center justify-between">
        <h2 class="section-title flex space-x-3">
            what is Insider Club?
        </h2>
        <button class="primary-button">
            Apply To Join
        </button>
    </div>

    <div class="container mt-4 sm:mt-8 md:mt-12 lg:mt-16 xl:mt-32">
        <!-- For investors -->
        <div
            class="relative bg-cover bg-center bg-no-repeat border-rounded text-white flex"
            style="background-image: url('{{ asset('assets/images/club/what-is-bg.png') }}')"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-100"></div>
            <div class="relative p-6 w-full xl:w-1/2">
                <div>
                    <h2 class="font-bold text-white uppercase text-lg xl:text-4xl">
                        for investors
                    </h2>
                    <p class="mt-4 text-white text-sm sm:text-base md:text-lg xl:text-xl xlWide:text-2xl italic text-balance">
                        Tired of being the last to know and the last to act? The
                        Insider’s Club changes the game. Here, you’re not just ahead of
                        the curve—you define it. From exclusive first looks to VIP site
                        tours, we offer privileges that turn market insights into your
                        competitive edge. Ready to shift from observer to leader?
                    </p>
                </div>
            </div>
            <img
                src="{{ asset('assets/images/club/team.png') }}"
                alt="Team"
                class="absolute w-1/2 right-0 bottom-0"
            />
        </div>
        <!-- For developers -->
        <div
            class="relative bg-cover bg-center bg-no-repeat border-rounded text-white flex justify-end mt-4 md:mt-8 xl:mt-16"
            style="background-image: url('{{ asset('assets/images/club/what-is-bg.png') }}')"
        >
            <div class="absolute border-rounded inset-0 bg-gradient-100"></div>
            <div class="relative p-6 w-full xl:w-1/2">
                <div>
                    <h2 class="font-bold text-white uppercase text-lg xl:text-4xl">
                        for developers
                    </h2>
                    <p class="mt-4 text-white text-sm sm:text-base md:text-lg xl:text-xl xlWide:text-2xl italic text-balance">
                        Picture your vision connecting with its ideal audience before
                        construction even begins. The Insider’s Club isn’t just a
                        platform; it’s a community—a direct pathway to buyers who
                        understand your vision. We’re not just finding customers; we’re
                        building advocates. Are you ready to stop selling and start
                        inspiring?
                    </p>
                </div>
            </div>
            <img
                src="{{ asset('assets/images/club/team-dev.png') }}"
                alt="Team"
                class="absolute w-1/2 left-0 bottom-0"
            />
        </div>
    </div>
</section>
