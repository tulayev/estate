@props([
    'types' => [],
])

<div
    x-data="typeDropdown({{ json_encode($types) }})"
    class="relative border-r border-borderColor h-full flex items-center justify-center w-[16%]"
>
    <input type="hidden" name="type" x-model="id" />
    <input
        type="text"
        placeholder="{{ __('general.search_type') }}"
        class="w-full modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
        x-model="query"
        @focus="open = true"
        @click.away="open = false"
        @input="filterTypes"
    />
    <ul
        x-show="open && filteredTypes.length > 0"
        class="px-3 py-4 space-y-2 absolute rounded-[14px] top-16 bg-white border border-borderColor w-full shadow-lg z-50 max-h-48 overflow-auto"
    >
        <template
            x-for="type in filteredTypes"
            :key="type.id"
        >
            <li
                @click="selectType(type)"
                class="random-bg-color px-2 py-4 rounded-[14px] cursor-pointer font-black text-white text-center"
            >
                <span x-text="type.name[locale]"></span>
            </li>
        </template>
    </ul>
</div>

<script defer>
    function typeDropdown(types) {
        return {
            locale: '{{ app()->getLocale() }}',
            id: '',
            query: '', // Input value
            open: false, // Controls dropdown visibility
            filteredTypes: types, // Filtered list of types

            filterTypes() {
                this.filteredTypes = types.filter(({ name }) =>
                    name[this.locale].toLowerCase().includes(this.query.toLowerCase())
                );
            },

            selectType(type) {
                this.id = type.id;
                this.query = type.name[this.locale];
                this.open = false;
            }
        };
    }
</script>
