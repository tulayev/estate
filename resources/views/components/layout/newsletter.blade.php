<section class="section">
    <div
        class="container"
        x-data="newsletterDropdown()"
    >
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
                <input
                    type="text"
                    class="modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
                    placeholder="{{ __('general.newsetter_choose') }}"
                    x-model="query"
                    @focus="open = true"
                    @click.away="open = false"
                />

                <ul
                    x-show="open"
                    class="px-3 py-4 space-y-2 absolute rounded-[14px] top-16 bg-white border border-borderColor w-full shadow-lg z-50 max-h-48 overflow-auto"
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

            <!-- Submit Button -->
            <div class="uk-width-1-4@s">
                <button class="relative sm:left-3  top-3 sm:top-0 bg-primary text-white border-rounded w-full text-xl font-bold h-full uppercase px-7 py-4">
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
