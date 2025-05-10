<div
    x-data="topicsDropdown()"
    class="relative border-r border-borderColor h-full flex items-center justify-center w-[72%]"
>
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

    <div>
        <ul
            x-show="open && suggestions.length > 0"
            class="absolute top-16 left-0 bg-white border border-borderColor w-full rounded-b-[14px] shadow-lg max-h-40 overflow-auto"
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
