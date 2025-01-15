<section class="club mt-10 sm:mt-20">
    <div class="mini-container flex items-center justify-between">
        <h2 class="section-title flex space-x-3">
            what is Insider Club?
        </h2>
        <button class="primary-button">
            Apply To Join
        </button>
    </div>

    <div class="mini-container py-2 md:py-4 xl:py-8">
        <!-- For investors -->
        <div class="relative bg-gray-600 text-white rounded-lg mb-6 mx-auto flex flex-wrap xl:flex-nowrap flex-col xl:flex-row">
            <img
                src="{{ asset('assets/images/club/what-is-bg.png') }}"
                alt="background"
                class="absolute inset-0 w-full h-full object-cover opacity-50"
            />
            <div class="relative p-6 w-full xl:w-1/2 text-left">
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
            <div class="w-full relative xl:w-1/2 h-full mt-10">
                <img
                    src="{{ asset('assets/images/club/team.png') }}"
                    alt="Team"
                    class="w-full"
                    style="filter: brightness(0.8)"
                />
            </div>
        </div>

        <!-- For developers -->
        <div class="relative bg-gray-600 text-white rounded-lg mb-6 mx-auto flex flex-wrap xl:flex-nowrap flex-col-reverse xl:flex-row overflow-hidden">
            <img
                src="{{ asset('assets/images/club/what-is-bg.png') }}"
                alt="Background"
                class="absolute inset-0 w-full h-full object-cover opacity-50"
            />
            <div
                class="w-full h-full relative xl:w-1/2 mt-10 xl:right-6 xxs:right-4"
            >
                <img
                    src="{{ asset('assets/images/club/team-dev.png') }}"
                    alt="Team"
                    class="w-full"
                    style="filter: brightness(0.8)"
                />
            </div>
            <div class="relative p-6 w-full xl:w-1/2 text-left">
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
        </div>
    </div>
</section>
