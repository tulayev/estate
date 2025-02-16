@props([
    'locations' => [],
])

<div
    x-data="locationDropdown({{ json_encode($locations) }})"
    class="relative border-r border-borderColor h-full flex items-center justify-center w-[24%]"
>
    <input
        type="hidden"
        name="locations"
        x-model="selectedLocations.map(l => l[locale])"
    />

    <input
        type="text"
        placeholder="{{ __('general.search_location') }}"
        class="w-full modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
        x-model="displayText"
        @focus="open = true"
        @click.away="open = false"
        readonly
    />
    <ul
        x-show="open && filteredLocations.length > 0"
        class="absolute top-16 bg-white border border-borderColor w-full rounded shadow-lg z-50 max-h-40 overflow-auto"
    >
        <template
            x-for="{ location, longitude, latitude } in filteredLocations"
            :key="longitude"
        >
            <li
                @click="toggleSelection(location)"
                class="px-2 py-4 rounded-[14px] cursor-pointer font-black text-primary hover:bg-primary hover:text-white"
                :class="selectedLocations.includes(location) ? 'bg-primary text-white' : ''"
            >
                <span x-text="location[locale]"></span>
            </li>
        </template>
    </ul>
</div>

<script defer>
    function locationDropdown(locations) {
        return {
            locale: '{{ app()->getLocale() }}',
            selectedLocations: [],
            open: false,
            filteredLocations: locations,

            get displayText() {
                if (this.selectedLocations.length === 0) {
                    return '';
                } else if (this.selectedLocations.length <= 1) {
                    return this.selectedLocations.map(l => l[this.locale]);
                } else {
                    return `${this.selectedLocations.length} items selected`;
                }
            },

            toggleSelection(location) {
                const index = this.selectedLocations.indexOf(location);
                if (index === -1) {
                    this.selectedLocations.push(location);
                } else {
                    this.selectedLocations = this.selectedLocations.filter(l => l !== location);
                }
            },
        };
    }
</script>
