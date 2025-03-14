<!-- Search Form -->
<div
    x-data="topicsDropdown()"
>
    <form
        id="searchForm"
        action="{{ route('pages.insight.index') }}"
        class="uk-visible@s z-10 bg-white rounded-full flex justify-between items-center absolute left-1/2 bottom-0 xl:bottom-[-10px] -translate-x-1/2 px-4 w-[85vw] lg:w-[91vw] xl:w-[65vw] h-[50px] xl:h-[62px]"
        autocomplete="off"
    >
        <div class="animate-spin-slow">
            <img
                src="{{ asset('assets/images/icons/circle.png') }}"
                alt="circle"
                class="w-6 lg:w-8 xl:w-10"
            />
        </div>

        <div class="relative border-r border-borderColor h-full flex items-center justify-center w-[72%]">
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

        <x-ui.search.topic-category-input :topicCategories="$topicCategories" />

        <div class="h-full flex items-center justify-end w-[5%] space-x-4">
            <div>
                <ul
                    x-show="open && suggestions.length > 0"
                    class="absolute top-16 left-0 bg-white border border-borderColor w-full rounded-b-[14px] shadow-lg max-h-44 overflow-auto"
                >
                    <template
                        x-for="{ id, title } in suggestions"
                        :key="id"
                    >
                        <li
                            @click="selectTopic(getLocalizedTitle(title))"
                            class="p-4 relative z-40 rounded-[14px] cursor-pointer font-black text-primary hover:bg-primary hover:text-white"
                        >
                            <span x-text="getLocalizedTitle(title)"></span>
                        </li>
                    </template>
                </ul>
            </div>

            <button type="submit">
                <img
                    src="{{ asset('assets/images/icons/search-icon.svg') }}"
                    alt="search"
                    class="w-6 lg:w-8 xl:w-10"
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
                    this.fetchTopics();
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
