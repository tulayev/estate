<!-- Search Form -->
<form
    id="searchForm"
    action="{{ route('pages.insight.index') }}"
    class="uk-visible@s justify-between text-secondary z-10 bg-white font-semibold uppercase rounded-full absolute left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 sm:flex items-center px-3 w-[90vw] lg:w-[70vw] h-[50px] xl:h-[70px] text-sm xl:text-xl"
    autocomplete="off"
    x-data="topicsDropdown()"
>
    <div>
        <img
            src="{{ asset('assets/images/icons/circle.png') }}"
            alt="circle"
            class="w-10"
        />
    </div>

    <div class="relative  h-full flex items-center w-full">
        <input
            type="text"
            name="title"
            placeholder="search"
            class="modal-subtitle w-full text-primary placeholder-secondary bg-transparent border-none text-center outline-none"
            x-model="query"
            @input.debounce="fetchTopics"
            @focus="onFocus"
            @click.away="open = false"
        />
    </div>

    <div class="h-full flex items-center justify-end w-[12%] md:w-[12%] space-x-5">
        <div>
            <img
                src="{{ asset('assets/images/icons/filter-dark.svg') }}"
                alt="circle"
                class="w-10"
            />
            <ul
                x-show="open && suggestions.length > 0"
                class="absolute top-[70px] left-0 bg-white border-rounded w-full shadow-card max-h-64 overflow-auto"
            >
                <template
                    x-for="{ id, title } in suggestions"
                    :key="id"
                >
                    <li
                        @click="selectTopic(getLocalizedTitle(title))"
                        class="p-4 relative z-40 rounded-xl cursor-pointer font-black text-primary hover:bg-primary hover:text-white"
                    >
                        <span x-text="getLocalizedTitle(title)"></span>
                    </li>
                </template>
            </ul>
        </div>
        <div class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px]">
            <button
                class="w-[30px] xl:w-[50px] h-[30px] xl:h-[50px] bg-primary rounded-full flex items-center justify-center"
                type="submit"
            >
                <img
                    class="w-[14px] xl:w-[20px]"
                    src="{{ asset('assets/images/icons/search.svg') }}"
                    alt="search"
                />
            </button>
        </div>
    </div>
</form>

<script>
    function topicsDropdown() {
        return {
            API_URI: '{{ route('topics.search.titles') }}',
            locale: '{{ app()->getLocale() }}',
            query: '',
            open: false,
            suggestions: [],

            fetchTopics() {
                const url = this.query
                    ? `${this.API_URI}?q=${encodeURIComponent(this.query)}`
                    : this.API_URI;

                axios.get(url)
                    .then((response) => {
                        this.suggestions = response.data;
                    })
                    .catch((error) => {
                        console.error('Error fetching topics:', error);
                    });
            },

            onFocus() {
                this.open = true;
                if (!this.query) {
                    this.fetchTopics(); // Fetch all topics if the query is empty
                }
            },

            selectTopic(topic) {
                this.query = topic;
                this.open = false;
            },

            getLocalizedTitle(title) {
                return title[this.locale];
            }
        };
    }
</script>
