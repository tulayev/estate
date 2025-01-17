<div
    x-data="locationDropdown()"
    class="relative px-10 border-r border-borderColor h-full flex items-center justify-center w-[20%]"
>
    <input
        type="text"
        name="location"
        placeholder="location"
        class="modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
        x-model="query"
        @input.debounce="fetchLocations"
        @focus="onFocus"
        @click.away="open = false"
    />
    <ul
        x-show="open && suggestions.length > 0"
        class="absolute top-16 bg-white border border-borderColor w-full rounded shadow-lg z-50 max-h-40 overflow-auto"
    >
        <template
            x-for="{ location, longitude, latitude } in suggestions"
            :key="longitude"
        >
            <li
                @click="selectLocation(getLocalizedLocationName(location))"
                class="px-2 py-4 rounded-[14px] cursor-pointer font-black text-primary hover:bg-primary hover:text-white"
            >
                <span x-text="getLocalizedLocationName(location)"></span>
            </li>
        </template>
    </ul>
</div>

<script>
    function locationDropdown() {
        return {
            locale: '{{ app()->getLocale() }}',
            query: '', // Input value
            open: false, // Controls dropdown visibility
            suggestions: [], // Holds fetched suggestions

            fetchLocations() {
                const url = this.query
                    ? `api/search/locations?q=${encodeURIComponent(this.query)}`
                    : 'api/search/locations';

                fetch(url)
                    .then((res) => res.json())
                    .then((data) => {
                        this.suggestions = data;
                    })
                    .catch((error) => console.error('Error fetching locations:', error));
            },

            onFocus() {
                this.open = true;
                if (!this.query) {
                    this.fetchLocations(); // Fetch all locations if the query is empty
                }
            },

            selectLocation(location) {
                this.query = location;
                this.open = false;
            },

            getLocalizedLocationName(location) {
                return location[this.locale];
            }
        };
    }
</script>
