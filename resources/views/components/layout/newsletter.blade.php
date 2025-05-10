<section class="section mb-4 sm:mb-0">
    <div
        class="container"
        x-data="newsletterDropdown()"
    >
        <h2 class="section-title mb-5 xl:mb-10">
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
                <div class="text-lg font-bold text-center w-full p-4 sm:p-2">
                    <input
                        type="email"
                        name="email"
                        placeholder="{{ __('general.newsetter_email') }}"
                        class="w-full modal-subtitle placeholder-secondary text-center outline-none"
                    />
                </div>
            </div>
            <!-- Preferences Input -->
            <div class="uk-width-1-2@s form-drop-down flex items-center justify-center h-full">
                <div class="text-lg font-bold text-center w-full p-4 sm:p-2">
                    <input
                        type="text"
                        name="preferences"
                        placeholder="{{ __('general.newsetter_choose') }}"
                        class="w-full modal-subtitle placeholder-secondary text-center outline-none"
                        x-model="query"
                        @focus="open = true"
                        @click.away="open = false"
                    />
                    <ul
                        x-show="open"
                        class="p-2 space-y-2 absolute top-full left-0 bg-white border border-borderColor w-full rounded-b-[14px] shadow-lg max-h-40 overflow-auto z-50"
                    >
                        <li><a href="#">Item 1</a></li>
                    </ul>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="uk-width-1-4@s">
                <button class="relative sm:left-3 top-3 sm:top-0 bg-primary text-white border-rounded w-full text-xl font-bold h-full uppercase px-7 py-4">
                    {{ __('general.newsetter_submit') }}
                </button>
            </div>
        </form>
    </div>
</section>


<script defer>
    function newsletterDropdown() {
        return {
            locale: '{{ app()->getLocale() }}',
            id: '',
            query: '',
            open: false,
        };
    }
</script>
