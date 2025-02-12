<!-- Newsletter -->
<section class="section">
    <div class="container">
        <h2 class="section-title mb-16">
            {{ __('general.newsetter_title') }}
        </h2>

        <form
            id="newsletterForm"
            class="shadow-card border-rounded uppercase bg-white flex flex-wrap items-center uk-grid-collapse uk-width-1-1@m uk-width-3-4@l w-full h-full"
            autocomplete="off"
            uk-grid
        >
            <!-- Email Input -->
            <div class="uk-width-1-4@s sm:border-r sm:border-borderColor flex items-center justify-center h-full">
                <div class="text-lg font-bold text-center w-full p-2">
                    <input
                        type="text"
                        name="name"
                        placeholder="{{ __('general.newsetter_email') }}"
                        class="text-lg outline-none uppercase text-center text-black placeholder:text-[#c6c6c6] box-border w-full"
                    />
                </div>
            </div>

            <!-- Preferences Input -->
            <div class="uk-width-1-2@s form-drop-down px-4 text-center">
        <span class="text-lg font-bold text-[#c6c6c6] block">
            {{ __('general.newsetter_choose') }}
        </span>
                <div
                    uk-dropdown="mode: hover; pos: bottom-justify;"
                    class="uk-dropdown uk-overflow-hidden uk-padding-remove"
                >
                    <ul
                        class="uk-nav uk-dropdown-nav uk-scrollable max-h-[50vw] sm:max-h-[20vw] overflow-y-auto p-2 shadow-md"
                    >
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li><a href="#">Item 1</a></li>
                        <li class="uk-nav-header">Header</li>
                        <li><a href="#">Item 2</a></li>
                        <li><a href="#">Item 3</a></li>
                        <li><a href="#">Item 4</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#">Item 5</a></li>
                        <li><a href="#">Item 6</a></li>
                        <li><a href="#">Item 7</a></li>
                        <li><a href="#">Item 8</a></li>
                    </ul>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="uk-width-1-4@s">
                <button class="relative sm:left-3  top-3 sm:top-0 bg-primary text-white border-rounded w-full text-xl font-bold h-full uppercase px-7 py-4">
                    {{ __('general.newsetter_submit') }}
                </button>
            </div>
        </form>
    </div>
</section>
