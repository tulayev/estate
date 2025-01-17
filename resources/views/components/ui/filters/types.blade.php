@props([
    'types' => null,
])

<div x-data="types()">
    <h3 class="mt-16 modal-subtitle text-primary">
        Type
        <span class="font-bold">|</span>
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black" @click="resetTypes">x</span>
        <span x-text="selectedTypeNames().join(', ')"></span>
    </h3>

    <div class="uk-child-width-1-3 mt-12" uk-grid>
        <input
            type="hidden"
            name="types"
            :value="selectedTypes.join(',')"
            x-bind:value="selectedTypes.join(',')"
        />

        @foreach($types as $type)
            <div>
                <div
                    class="modal-subtitle cursor-pointer p-6 border-rounded text-4xl text-white text-center"
                    :class="[getRandomColor(), isTypeSelected('{{ $type->id }}') ? 'hidden' : '']"
                    @click="addType('{{ $type->id }}')"
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
            locale: '{{ app()->getLocale() }}',
            selectedTypes: [],
            allTypes: @json($types),
            colors: ['bg-tag-1', 'bg-tag-2', 'bg-tag-3', 'bg-tag-4'],

            addType(type) {
                if (!this.selectedTypes.includes(type)) {
                    this.selectedTypes.push(type);
                }
            },

            getRandomColor() {
                return this.colors[Math.floor(Math.random() * this.colors.length)];
            },

            isTypeSelected(type) {
                return this.selectedTypes.includes(type);
            },

            resetTypes() {
                this.selectedTypes = [];
            },

            selectedTypeNames() {
                return this.selectedTypes.map(id => {
                    const type = this.allTypes.find(type => type.id == id);
                    return type ? type.name[this.locale] : '';
                });
            }
        }
    }
</script>
