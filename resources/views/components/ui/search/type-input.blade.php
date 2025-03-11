@props([
    'types' => [],
])

<div
    x-data="typeDropdown({{ json_encode($types) }})"
    class="relative border-r border-borderColor h-full flex items-center justify-center w-[16%]"
>
    <input
        type="hidden"
        name="type"
        x-model="selectedIds"
    />

    <input
        type="text"
        placeholder="{{ __('general.search_type') }}"
        class="w-full modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
        x-model="displayText"
        @focus="open = true"
        @click.away="open = false"
        readonly
    />
    <ul
        x-show="open && filteredTypes.length > 0"
        class="px-3 py-4 space-y-2 absolute top-16 bg-white border border-borderColor w-full rounded-b-[14px] shadow-lg z-50 max-h-48 overflow-auto"
    >
        <template
            x-for="type in filteredTypes"
            :key="type.id"
        >
            <li
                @click="toggleSelection(type)"
                class="random-bg-color px-2 py-4 rounded-[10px] cursor-pointer font-black text-center text-white hover:bg-primary"
                :class="selectedIds.includes(type.id) ? 'bg-primary' : ''"
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
            selectedIds: [],
            selectedTypes: [],
            open: false,
            filteredTypes: types,
            localizedInputText: {
                en: 'items selected',
                ru: 'элементов выбрано',
            },

            get displayText() {
                if (this.selectedTypes.length === 0) {
                    return '';
                } else if (this.selectedTypes.length <= 1) {
                    return this.selectedTypes.map(t => t.name[this.locale]);
                } else {
                    return `${this.selectedTypes.length} ${this.localizedInputText[this.locale]}`;
                }
            },

            toggleSelection(type) {
                const index = this.selectedIds.indexOf(type.id);
                if (index === -1) {
                    this.selectedIds.push(type.id);
                    this.selectedTypes.push(type);
                } else {
                    this.selectedIds.splice(index, 1);
                    this.selectedTypes = this.selectedTypes.filter(t => t.id !== type.id);
                }
            },
        };
    }
</script>
