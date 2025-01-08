@props([
    'tags' => null,
])

<div x-data="tags()">
    <h3 class="mt-40 modal-subtitle text-primary">
        Tags |
        <span
            class="font-700 cursor-pointer"
            @click="resetTags"
        >
            x
        </span>
        <span
            id="selectedTags"
            x-text="selectedTags.join(', ')"
        ></span>
    </h3>
    <div class="mt-6 tags flex flex-wrap gap-4">
        @foreach($tags as $tag)
            <div
                class="tag modal-subtitle cursor-pointer text-white text-center p-3 rounded-[25px]"
                :class="[getRandomColor(), isTagSelected('{{ $tag->name }}') ? 'hidden' : '']"
                @click="addTag('{{ $tag->name }}')"
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
            colors: ['bg-tag-1', 'bg-tag-2', 'bg-tag-3', 'bg-tag-4'],

            addTag(tag) {
                if (!this.selectedTags.includes(tag)) {
                    this.selectedTags.push(tag);
                }
            },

            getRandomColor() {
                return this.colors[Math.floor(Math.random() * this.colors.length)];
            },

            isTagSelected(tagName) {
                return this.selectedTags.includes(tagName);
            },

            resetTags() {
                this.selectedTags = [];
            }
        }
    }
</script>
