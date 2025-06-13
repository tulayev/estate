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
        <span
            class="font-normal cursor-pointer hover:text-red-500 hover:font-black"
            @click="resetTypes"
        >
            x
        </span>
        <span>
            <template
                x-for="(name, index) in selectedTypeNames()"
                :key="selectedIds[index]"
            >
                <span
                    class="cursor-pointer hover:text-red-500"
                    @click="removeType(selectedIds[index])"
                    x-text="name + (index < selectedTypeNames().length - 1 ? ', ' : '')"
                ></span>
            </template>
        </span>
    </h3>

    <input
        id="types"
        type="hidden"
        name="types"
        :value="selectedIds.join(',')"
    />

    <div class="uk-child-width-4-1@s uk-child-width-expand@m uk-grid-small uk-grid-match uk-margin mt-6 sm:mt-8 md:mt-12" uk-grid>
        @foreach ($types as $type)
            <div x-show="!isTypeSelected('{{ $type->id }}')" class="uk-width-auto uk-margin-top">
                <div
                    class="modal-subtitle {{ $type->color_ui_tag ? 'filter-type-bg' : 'random-bg-color' }} cursor-pointer border-rounded text-white text-center p-2 md:p-4 lg:p-6"
                    @click="addType('{{ $type->id }}')"
                    style="{{ $type->color_ui_tag ? '--filter-type-bg-color: '.$type->color_ui_tag.';' : '' }}"
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
            selectedIds: [],
            allTypes: @json($types),

            addType(id) {
                if (!this.selectedIds.includes(id)) {
                    this.selectedIds.push(id);
                }
            },

            isTypeSelected(id) {
                return this.selectedIds.includes(id);
            },

            removeType(id) {
                this.selectedIds = this.selectedIds.filter(selectedId => selectedId !== id);
            },

            resetTypes() {
                this.selectedIds = [];
            },

            selectedTypeNames() {
                return this.selectedIds.map(id => {
                    const type = this.allTypes.find(t => t.id == id);
                    return type ? type.name[this.locale] : '';
                });
            }
        }
    }
</script>
