@props([
    'tags' => null,
])

<div
    class="mt-8 sm:mt-10 md:mt-20 xl:mt-24"
    x-data="tags()"
>
    <h3 class="modal-subtitle text-primary">
        {{ __('general.filter_popup_tags') }}
        <span class="font-bold">|</span>
        <span
            class="font-normal cursor-pointer hover:text-red-500 hover:font-black"
            @click="resetTags"
        >
            x
        </span>
        <span>
            <template
                x-for="(name, index) in selectedTagNames()"
                :key="selectedIds[index]"
            >
                <span
                    class="cursor-pointer hover:text-red-500"
                    @click="removeTag(selectedIds[index])"
                    x-text="name + (index < selectedTagNames().length - 1 ? ', ' : '')"
                ></span>
            </template>
        </span>
    </h3>

    <input
        id="tags"
        type="hidden"
        name="tags"
        :value="selectedIds.join(',')"
    />

    <div class="mt-6 tags uk-child-width-1-2 uk-child-width-auto@s uk-grid-small" uk-grid>
        @foreach($tags as $tag)
            <div>
                <div
                    class="tag random-bg-color modal-subtitle cursor-pointer text-white text-center p-3 border-rounded"
                    :class="isTagSelected('{{ $tag->id }}') ? 'hidden' : ''"
                    @click="addTag('{{ $tag->id }}')"
                >
                    {{ $tag->name }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script defer>
    function tags() {
        return {
            locale: '{{ app()->getLocale() }}',
            selectedIds: [],
            allTags: @json($tags),

            addTag(id) {
                if (!this.selectedIds.includes(id)) {
                    this.selectedIds.push(id);
                }
            },

            isTagSelected(id) {
                return this.selectedIds.includes(id);
            },

            removeTag(id) {
                this.selectedIds = this.selectedIds.filter(selectedId => selectedId !== id);
            },

            resetTags() {
                this.selectedIds = [];
            },

            selectedTagNames() {
                return this.selectedIds.map(id => {
                    const tag = this.allTags.find(t => t.id == id);
                    return tag ? tag.name[this.locale] : '';
                });
            }
        }
    }
</script>
