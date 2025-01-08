@props([
    'tags' => null,
])

<div x-data="tags()">
    <h3 class="mt-40 modal-subtitle text-primary">
        Tags
        <span class="font-700">|</span>
        <span class="font-400 cursor-pointer hover:text-red-500 hover:font-900" @click="resetTags">x</span>
        <span x-text="selectedTagNames('{{ app()->getLocale() }}').join(', ')"></span>
    </h3>
    <div class="mt-6 tags flex flex-wrap gap-4">
        <input
            type="hidden"
            name="tags"
            :value="selectedTags.join(',')"
            x-bind:value="selectedTags.join(',')"
        />

        @foreach($tags as $tag)
            <div
                class="tag modal-subtitle cursor-pointer text-white text-center p-3 rounded-[25px]"
                :class="[getRandomColor(), isTagSelected('{{ $tag->id }}') ? 'hidden' : '']"
                @click="addTag('{{ $tag->id }}')"
            >
                {{ $tag->name }}
            </div>
        @endforeach
    </div>
</div>

<script>
    function tags() {
        return {
            selectedTags: [],
            allTags: @json($tags),
            colors: ['bg-tag-1', 'bg-tag-2', 'bg-tag-3', 'bg-tag-4'],

            addTag(tag) {
                if (!this.selectedTags.includes(tag)) {
                    this.selectedTags.push(tag);
                }
            },

            getRandomColor() {
                return this.colors[Math.floor(Math.random() * this.colors.length)];
            },

            isTagSelected(tag) {
                return this.selectedTags.includes(tag);
            },

            resetTags() {
                this.selectedTags = [];
            },

            selectedTagNames(locale) {
                return this.selectedTags.map(id => {
                    const tag = this.allTags.find(tag => tag.id == id);
                    return tag ? tag.name[locale] : '';
                });
            }
        }
    }
</script>
