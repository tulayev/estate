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
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black" @click="resetTags">x</span>
        <span x-text="selectedTagNames().join(', ')"></span>
    </h3>
    <div class="mt-6 tags uk-child-width-1-2 uk-child-width-auto@s uk-grid-small" uk-grid>
        <input
            type="hidden"
            name="tags"
            :value="selectedTags.join(',')"
            x-bind:value="selectedTags.join(',')"
        />

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
            selectedTags: [],
            allTags: @json($tags),

            addTag(tag) {
                if (!this.selectedTags.includes(tag)) {
                    this.selectedTags.push(tag);
                }
            },

            isTagSelected(tag) {
                return this.selectedTags.includes(tag);
            },

            resetTags() {
                this.selectedTags = [];
            },

            selectedTagNames() {
                return this.selectedTags.map(id => {
                    const tag = this.allTags.find(tag => tag.id == id);
                    return tag ? tag.name[this.locale] : '';
                });
            }
        }
    }
</script>
