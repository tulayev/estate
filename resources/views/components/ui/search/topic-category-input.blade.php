@props([
    'topicCategories' => [],
])

<div
    x-data="topicCategoryDropdown({{ json_encode($topicCategories) }})"
    class="relative border-r border-borderColor h-full flex items-center justify-center w-[23%]"
>
    <input
        type="hidden"
        name="category"
        x-model="selectedIds"
    />

    <div class="relative w-full modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none">
        <input
            type="text"
            class="w-full modal-subtitle placeholder-secondary bg-transparent border-none text-center outline-none"
            x-model="displayText"
            @focus="open = true"
            @click.away="open = false"
            :hidden="displayText == ''"
            readonly
        />
        <img
            src="{{ asset('assets/images/icons/filter-dark.svg') }}"
            alt="search"
            class="w-6 h-6 mx-auto cursor-pointer"
            @click="open = true"
            @click.away="open = false"
            :hidden="displayText != ''"
        />
    </div>
    <ul
        x-show="open && filteredTopicCategories.length > 0"
        class="px-3 py-4 space-y-2 absolute top-16 bg-white border border-borderColor w-full rounded-b-[14px] shadow-lg z-50 max-h-36 overflow-auto"
    >
        <template
            x-for="topicCategory in filteredTopicCategories"
            :key="topicCategory.id"
        >
            <li
                @click="toggleSelection(topicCategory)"
                class="random-bg-color px-2 py-4 rounded-[10px] cursor-pointer font-black text-center text-white hover:bg-primary"
                :class="selectedIds.includes(topicCategory.id) ? 'bg-primary' : ''"
            >
                <span x-text="topicCategory.title[locale]"></span>
            </li>
        </template>
    </ul>
</div>

<script defer>
    function topicCategoryDropdown(topicCategories) {
        return {
            locale: '{{ app()->getLocale() }}',
            selectedIds: [],
            selectedTopicCategories: [],
            open: false,
            filteredTopicCategories: topicCategories,
            localizedInputText: {
                en: 'items selected',
                ru: 'элементов выбрано',
            },

            get displayText() {
                if (this.selectedTopicCategories.length === 0) {
                    return '';
                } else if (this.selectedTopicCategories.length <= 1) {
                    return this.selectedTopicCategories.map(t => t.title[this.locale]);
                } else {
                    return `${this.selectedTopicCategories.length} ${this.localizedInputText[this.locale]}`;
                }
            },

            toggleSelection(topicCategory) {
                const index = this.selectedIds.indexOf(topicCategory.id);
                if (index === -1) {
                    this.selectedIds.push(topicCategory.id);
                    this.selectedTopicCategories.push(topicCategory);
                } else {
                    this.selectedIds.splice(index, 1);
                    this.selectedTopicCategories = this.selectedTopicCategories.filter(t => t.id !== topicCategory.id);
                }
            },
        };
    }
</script>
