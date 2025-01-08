@props([
    'types' => null,
])

<div x-data="types()">
    <h3 class="mt-16 modal-subtitle text-primary">
        Type
        <span
            class="font-700"
        >
            |
        </span>
        <span
            class="font-400 cursor-pointer hover:text-red-500 hover:font-900"
            @click="resetTypes"
        >
            x
        </span>
        <span
            id="selectedTypes"
            x-text="selectedTypes.join(', ')"
        ></span>
    </h3>

    <div class="uk-child-width-1-3 mt-12" uk-grid>
        @foreach($types as $type)
            <div>
                <div
                    class="modal-subtitle cursor-pointer p-6 rounded-[25px] text-4xl text-white text-center"
                    :class="[getRandomColor(), isTypeSelected('{{ $type->name }}') ? 'hidden' : '']"
                    @click="addType('{{ $type->name }}')"
                >
                    {{ $type->name }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function types() {
        return {
            selectedTypes: [],
            colors: ['bg-tag-1', 'bg-tag-2', 'bg-tag-3', 'bg-tag-4'],

            addType(type) {
                if (!this.selectedTypes.includes(type)) {
                    this.selectedTypes.push(type);
                }
            },

            getRandomColor() {
                return this.colors[Math.floor(Math.random() * this.colors.length)];
            },

            isTypeSelected(typeName) {
                return this.selectedTypes.includes(typeName);
            },

            resetTypes() {
                this.selectedTypes = [];
            }
        }
    }
</script>
