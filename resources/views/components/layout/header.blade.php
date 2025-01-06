<div class="header">
    <div id="header" class="navbar">
        <header class="header absolute top-0 left-0 w-full z-10" uk-scrollspy="target: .animLeft; cls: animate__animated animate__lightSpeedInLeft; delay: 300;">
            <div class="mini-container">
                <nav class="uk-flex uk-flex-between uk-flex-middle pt-[20px] xl:pt-[50px]">
                    <div class="animLeft">
                        <a href="{{ route('pages.home.index') }}">
                            <img class="w-[200px] xlWide:w-[260px] uk-animation-fade" src="{{ asset('') }}assets/images/logoicon.svg" alt="Logo" />
                        </a>
                    </div>

                    <div class="uk-navbar-right text-[#fff]" uk-scrollspy="target: .animRight; cls: uk-animation-slide-right; delay: 300;">

                        <ul class="hidden xl:flex uk-flex-middle uppercase text-base xlWide:text-xl" uk-grid>
                            <li class="animRight">
                                <a href="{{ route('pages.listing.index') }}" class="font-600 line-animation">
                                    listings
                                </a>
                            </li>
                            <li class="animRight">
                                <a href="{{ route('pages.club.index') }}" class="font-600 line-animation">
                                    insider club
                                </a>
                            </li>
                            <li class="animRight">
                                <a href="{{ route('pages.about.index') }}" class="font-600 line-animation">
                                    about us
                                </a>
                            </li>
                            <li class="animRight">
                                <a href="{{ route('pages.insight.index') }}" class="font-600 line-animation">
                                    insights
                                </a>
                            </li>
                        </ul>

                        <div class="text-white animRight ml-10">
                            uz/ru
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
</div>
