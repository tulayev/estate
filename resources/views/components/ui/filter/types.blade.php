@props([
    'types' => null,
])

<div
    class="mt-4 sm:mt-6 md:mt-10 xl:mt-16"
    x-data="types()"
>
    <h3 class="modal-subtitle text-primary">
        {{ __('general.filter_popup_type') }}
        <span class="font-bold">|</span>
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black" @click="resetTypes">x</span>
        <span x-text="selectedTypeNames().join(', ')"></span>
    </h3>

    <input
        type="hidden"
        name="types"
        :value="selectedTypes.join(',')"
        x-bind:value="selectedTypes.join(',')"
    />

    <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-grid-small mt-6 sm:mt-8 md:mt-12" uk-grid>
        @foreach($types as $type)
            <div>
                <div
                    class="modal-subtitle random-bg-color cursor-pointer border-rounded text-white text-center p-2 md:p-4 lg:p-6"
                    :class="isTypeSelected('{{ $type->id }}') ? 'hidden' : ''"
                    @click="addType('{{ $type->id }}')"
                >
                    {{ $type->name }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script defer>
    function types() {
        return {
            locale: '{{ app()->getLocale() }}',
            selectedTypes: [],
            allTypes: @json($types),

            addType(type) {
                if (!this.selectedTypes.includes(type)) {
                    this.selectedTypes.push(type);
                }
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
