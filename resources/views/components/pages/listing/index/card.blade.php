<section class="section">
    <div class="container pb-10 sm:pb-24">
        <div class="w-full flex justify-between">
            <div class="collapse-title">
                For sale | off plan
            </div>
            <button>
                <img src="{{ asset('assets/images/icons/heart-red.svg') }}" alt="like" />
            </button>
        </div>

        <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m mt-10" uk-grid>
            <div>
                <div
                    class="relative bg-cover bg-center bg-no-repeat flex flex-col justify-between border-rounded p-3 h-[300px]"
                    style="background-image: url('{{asset('assets/images/listings/index/listings-card-bg.png') }}');"
                >
                    <div class="absolute border-rounded inset-0 bg-gradient-50"></div>
                    <!-- Image Top -->
                    <div class="flex justify-between items-center z-10">
                        <div class="flex items-center space-x-2">
                            <div class="card-tag-button bg-[#5A6BC9bb]">
                                Name
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            <button>
                                <img
                                    src="{{ asset('assets/images/icons/filter.svg') }}"
                                    alt="filter"
                                />
                            </button>
                            <button>
                                <img
                                    src="{{ asset('assets/images/icons/heart-red.svg') }}"
                                    alt="like"
                                />
                            </button>
                        </div>
                    </div>
                    <!-- Image Bottom -->
                    <a
                        href=""
                        class="z-10"
                    >
                        <div class="flex justify-between items-center uppercase text-sm sm:text-base md:text-lg">
                            <div class="flex items-center space-x-2">
                                <img
                                    class="w-6"
                                    src="{{ asset('assets/images/icons/verified.svg') }}"
                                    alt="verified"
                                />
                                <p class="text-white sm:font-bold">
                                    Title
                                </p>
                            </div>
                            <div>
                                <span class="text-white sm:font-bold">
                                    $1000
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Bottom -->
                <div class="shadow-card border-rounded mt-[-54px] sm:mt-[-44px] px-3 sm:px-5 pt-[68px] pb-4 sm:pb-6">
                    <div class="flex justify-between uppercase text-[#505050] text-sm sm:text-base md:text-lg xl:text-xl sm:font-bold md:font-black">
                        <div>
                            <p>📍 Location</p>
                        </div>
                        <div class="flex justify-between space-x-6">
                            <p>🛏️ 1</p>
                            <p>🛁 1</p>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>

        <div class="w-full flex justify-center mt-10">
            <button class="bg-primary text-white border-rounded w-full bottom-0 text-xl font-bold h-[60px] md:h-[80px]">
                See More
            </button>
        </div>
    </div>
</section>
