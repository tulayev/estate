@props([
    'topicCategories' => null,
])

<div
    class="mt-8 sm:mt-10 md:mt-20 xl:mt-24"
    x-data="topicCategories()"
>
    <h3 class="modal-subtitle text-primary">
        Categories
        <span class="font-bold">|</span>
        <span
            class="font-normal cursor-pointer hover:text-red-500 hover:font-black"
            @click="resetTopicCategories"
        >
            x
        </span>
        <span>
            <template
                x-for="(title, index) in selectedTopicCategoryTitles()"
                :key="selectedIds[index]"
            >
                <span
                    class="cursor-pointer hover:text-red-500"
                    @click="removeTopicCategory(selectedIds[index])"
                    x-text="title + (index < selectedTopicCategoryTitles().length - 1 ? ', ' : '')"
                ></span>
            </template>
        </span>
    </h3>

    <input
        id="topicCategories"
        type="hidden"
        name="category"
        :value="selectedIds.join(',')"
    />

    <div class="mt-6 topicCategories uk-child-width-1-2 uk-child-width-auto@s uk-grid-small" uk-grid>
        @foreach($topicCategories as $topicCategory)
            <div>
                <div
                    class="topicCategory random-bg-color modal-subtitle cursor-pointer text-white text-center p-3 border-rounded"
                    :class="isTopicCategorySelected('{{ $topicCategory->id }}') ? 'hidden' : ''"
                    @click="addTopicCategory('{{ $topicCategory->id }}')"
                >
                    {{ $topicCategory->title }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script defer>
    function topicCategories() {
        return {
            locale: '{{ app()->getLocale() }}',
            selectedIds: [],
            allTopicCategories: @json($topicCategories),

            addTopicCategory(id) {
                if (!this.selectedIds.includes(id)) {
                    this.selectedIds.push(id);
                }
            },

            isTopicCategorySelected(id) {
                return this.selectedIds.includes(id);
            },

            removeTopicCategory(id) {
                this.selectedIds = this.selectedIds.filter(selectedId => selectedId !== id);
            },

            resetTopicCategories() {
                this.selectedIds = [];
            },

            selectedTopicCategoryTitles() {
                return this.selectedIds.map(id => {
                    const topicCategory = this.allTopicCategories.find(tc => tc.id == id);
                    return topicCategory ? topicCategory.title[this.locale] : '';
                });
            }
        }
    }
</script>
