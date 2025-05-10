@props([
    'primary' => null,
    'resales' => null,
    'land' => null,
    'rent' => null,
])

<div
    class="mt-4 sm:mt-6 md:mt-10 xl:mt-16"
    x-data="types()"
>
    <h3 class="modal-subtitle text-primary">
        {{ __('general.filter_popup_type') }}
        <span class="font-bold">|</span>
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black" @click="resetSelectedItems">x</span>
        <span x-text="selectedTypeNames().join(', ')"></span>
    </h3>

    <input
        id="types"
        type="hidden"
        name="types"
        :value="selectedTypeIds.join(',')"
    />

    <input
        id="tags"
        type="hidden"
        name="tags"
        :value="selectedTagIds.join(',')"
    />

    <div class="uk-child-width-1-2 uk-child-width-expand@s uk-grid-small mt-6 sm:mt-8 md:mt-12" uk-grid>
        <div>
            <div
                class="modal-subtitle random-bg-color cursor-pointer border-rounded text-white text-center p-2 md:p-4 lg:p-6"
                :class="isTypeSelected('{{ $rent->id }}') ? 'hidden' : ''"
                @click="addType('{{ $rent->id }}')"
            >
                {{ $rent->name }}
            </div>
        </div>
        <div>
            <div
                class="modal-subtitle random-bg-color cursor-pointer border-rounded text-white text-center p-2 md:p-4 lg:p-6"
                :class="isTypeSelected('{{ $primary->id }}') ? 'hidden' : ''"
                @click="addType('{{ $primary->id }}')"
            >
                {{ $primary->name }}
            </div>
        </div>
        <div>
            <div
                class="modal-subtitle random-bg-color cursor-pointer border-rounded text-white text-center p-2 md:p-4 lg:p-6"
                :class="isTypeSelected('{{ $resales->id }}') ? 'hidden' : ''"
                @click="addType('{{ $resales->id }}')"
            >
                {{ $resales->name }}
            </div>
        </div>
        <div>
            <div
                class="modal-subtitle random-bg-color cursor-pointer border-rounded text-white text-center p-2 md:p-4 lg:p-6"
                :class="isTagSelected('{{ $land->id }}') ? 'hidden' : ''"
                @click="addTag('{{ $land->id }}')"
            >
                {{ $land->name }}
            </div>
        </div>
    </div>
</div>

<script defer>
    function types() {
        return {
            locale: '{{ app()->getLocale() }}',
            selectedTypeIds: [],
            selectedTagIds: [],
            allTypeIds: [
                @json($rent),
                @json($primary),
                @json($resales),
            ],
            allTagIds: [
                @json($land)
            ],

            addType(id) {
                if (!this.selectedTypeIds.includes(id)) {
                    this.selectedTypeIds.push(id);
                }
            },

            addTag(id) {
                if (!this.selectedTagIds.includes(id)) {
                    this.selectedTagIds.push(id);
                }
            },

            isTypeSelected(id) {
                return this.selectedTypeIds.includes(id);
            },

            isTagSelected(id) {
                return this.selectedTagIds.includes(id);
            },

            resetSelectedItems() {
                this.selectedTypeIds = [];
                this.selectedTagIds = [];
            },

            selectedTypeNames() {
                const data = [
                    this.selectedTypeIds.map(id => {
                        const type = this.allTypeIds.find(t => t.id == id);
                        return type ? type.name[this.locale] : '';
                    }),
                    this.selectedTagIds.map(id => {
                        const tag = this.allTagIds.find(t => t.id == id);
                        return tag ? tag.name[this.locale] : '';
                    }),
                ];
                return data.flat();
            }
        }
    }
</script>
