<!-- Search Form -->
<div
    x-data="topicsDropdown()"
>
    <form
        id="searchForm"
        action="{{ route('pages.insight.index') }}"
        class="uk-visible@s z-10 bg-white rounded-full flex justify-between items-center absolute left-1/2 bottom-0 xl:bottom-[-15px] -translate-x-1/2 px-2 w-[85vw] lg:w-[91vw] xl:w-[67vw] h-[50px] xl:h-[70px]"
        autocomplete="off"
    >
        <div class="animate-spin-fast">
            <img
                src="{{ asset('assets/images/icons/circle.png') }}"
                alt="circle"
                class="w-6 lg:w-8 xl:w-10"
            />
        </div>

        <div class="relative h-full flex items-center w-full">
            <input
                type="text"
                name="title"
                placeholder="{{ __('club/main.search_placeholder') }}"
                class="w-full modal-subtitle placeholder-secondary bg-transparent border-none text-left outline-none px-2"
                x-model="query"
                @input.debounce="fetchTopics"
                @focus="onFocus"
                @click.away="open = false"
            />
        </div>

        <div class="h-full flex items-center justify-end w-[12%] space-x-4">
            <div>
                <img
                    src="{{ asset('assets/images/icons/filter-dark.svg') }}"
                    alt="circle"
                    class="hidden w-10"
                />
                <ul
                    x-show="open && suggestions.length > 0"
                    class="absolute top-[70px] left-0 bg-white border-rounded w-full shadow-card max-h-56 overflow-auto"
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
            <button
                class="w-6 h-6 lg:w-8 lg:h-8 xl:w-10 xl:h-10 bg-primary rounded-full flex items-center justify-center"
                type="submit"
            >
                <img
                    class="w-3 lg:w-4 xl:w-5"
                    src="{{ asset('assets/images/icons/search.svg') }}"
                    alt="search"
                />
            </button>
        </div>
    </form>
</div>

<script defer>
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
