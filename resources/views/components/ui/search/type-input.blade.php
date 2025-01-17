@props([
    'types' => [],
])

<div
    x-data="typeDropdown({{ json_encode($types) }})"
    class="relative px-10 border-r border-borderColor h-full flex items-center justify-center w-[15%]"
>
    <input
        type="text"
        name="type"
        placeholder="type"
        class="xl:modal-subtitle text-primary placeholder-secondary bg-transparent border-none text-center outline-none"
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
                @click="selectType(getLocalizedTypeName(type))"
                class="px-2 py-4 rounded-[14px] cursor-pointer font-black text-white text-center"
                :class="getRandomColor()"
            >
                <span x-text="getLocalizedTypeName(type)"></span>
            </li>
        </template>
    </ul>
</div>

<script>
    function typeDropdown(types) {
        return {
            locale: '{{ app()->getLocale() }}',
            query: '', // Input value
            open: false, // Controls dropdown visibility
            filteredTypes: types, // Filtered list of types
            colors: ['bg-tag-1', 'bg-tag-2', 'bg-tag-3', 'bg-tag-4'],

            filterTypes() {
                this.filteredTypes = types.filter(({ name }) =>
                    name[this.locale].toLowerCase().includes(this.query.toLowerCase())
                );
            },

            selectType(type) {
                this.query = type;
                this.open = false;
            },

            getLocalizedTypeName({ name }) {
                return name[this.locale];
            },

            getRandomColor() {
                return this.colors[Math.floor(Math.random() * this.colors.length)];
            }
        };
    }
</script>
