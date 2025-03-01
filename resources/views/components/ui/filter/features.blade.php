@props([
    'features' => null,
])

<div
    class="mt-8 sm:mt-10 md:mt-20 xl:mt-24"
    x-data="features()"
>
    <h3 class="modal-subtitle text-primary">
        {{ __('general.filter_popup_facilities') }}
        <span class="font-bold">|</span>
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black" @click="resetFeatures">x</span>
        <span x-text="selectedFeatureNames().join(', ')"></span>
    </h3>
    <div class="mt-6 sm:mt-8 xl:mt-12 uk-grid-column-medium uk-child-width-1-1 uk-child-width-1-2@xl" uk-grid>
        <div>
            <h4 class="modal-subtitle text-secondary">
                {{ __('general.filter_popup_bathrooms') }}
            </h4>
            <div class="shadow-card border-rounded mt-3 p-4 sm:p-6 xl:px-14 xl:py-7 flex items-center justify-around xl:justify-between">
                <img src="{{ asset('assets/images/icons/bath.png') }}" alt="bath" />
                <x-ui.filter.ranges.bath-range
                    :step="1"
                    :minValue="0"
                    :maxValue="100"
                />
            </div>
        </div>
        <div>
            <h4 class="modal-subtitle text-secondary">
                {{ __('general.filter_popup_bedrooms') }}
            </h4>
            <div class="shadow-card border-rounded mt-3 p-4 sm:p-6 xl:px-14 xl:py-7 flex items-center justify-around xl:justify-between">
                <img src="{{ asset('assets/images/icons/bed.png') }}" alt="bed" />
                <x-ui.filter.ranges.bed-range
                    :step="1"
                    :minValue="0"
                    :maxValue="100"
                />
            </div>
        </div>
    </div>
    <div class="features mt-6 md:mt-10 flex justify-around flex-wrap gap-2 sm:gap-4">

        <input
            type="hidden"
            name="features"
            :value="selectedIds.join(',')"
        />

        <div class="uk-grid-small uk-child-width-1-2 uk-child-width-auto@s" uk-grid uk-height-match="target: > div > .feature">
            @foreach($features as $feature)
                <div>
                    <div
                        class="feature shadow-card border-rounded flex justify-center items-center cursor-pointer p-2 sm:p-4 md:px-6 md:py-8"
                        :class="isFeatureSelected('{{ $feature->id }}') ? 'bg-primary' : 'bg-white'"
                        @click="toggleFeature('{{ $feature->id }}')"
                    >
                        <div>
                            <p
                                class="modal-subtitle text-center"
                                :class="isFeatureSelected('{{ $feature->id }}') ? 'text-white' : 'text-primary'"
                            >
                                {{ $feature->name }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script defer>
    function features() {
        return {
            locale: '{{ app()->getLocale() }}',
            selectedIds: [],
            allFeatures: @json($features),

            toggleFeature(id) {
                if (this.selectedIds.includes(id)) {
                    this.selectedIds = this.selectedIds.filter(f => f !== id);
                } else {
                    this.selectedIds.push(id);
                }
            },

            isFeatureSelected(id) {
                return this.selectedIds.includes(id);
            },

            resetFeatures() {
                this.selectedIds = [];
            },

            selectedFeatureNames() {
                return this.selectedIds.map(id => {
                    const feature = this.allFeatures.find(f => f.id == id);
                    return feature ? feature.name[this.locale] : '';
                });
            }
        }
    }
</script>
