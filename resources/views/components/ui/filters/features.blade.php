@props([
    'features' => null,
])

<div x-data="features()">
    <h3 class="mt-40 modal-subtitle text-primary">
        Facilities
        <span class="font-bold">|</span>
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black" @click="resetFeatures">x</span>
        <span x-text="selectedFeatureNames('{{ app()->getLocale() }}').join(', ')"></span>
    </h3>
    <div class="mt-12 uk-child-width-1-2" uk-grid>
        <div>
            <h4 class="modal-subtitle text-secondary">bathrooms</h4>
            <div class="shadow-card border-rounded mt-3 px-14 py-7 flex items-center justify-between">
                <img src="{{ asset('assets/images/icons/bath.png') }}" alt="bath" />
                <x-ui.filters.ranges.bath-range
                    :fromInputName="'bathrooms_min'"
                    :toInputName="'bathrooms_max'"
                    :minLength="1"
                    :maxLength="2"
                    :step="1"
                    :minValue="1"
                    :maxValue="99"
                />
            </div>
        </div>
        <div>
            <h4 class="modal-subtitle text-secondary">bedrooms</h4>
            <div class="shadow-card border-rounded mt-3 px-14 py-7 flex items-center justify-between">
                <img src="{{ asset('assets/images/icons/bed.png') }}" alt="bed" />
                <x-ui.filters.ranges.bed-range
                    :fromInputName="'bedrooms_min'"
                    :toInputName="'bedrooms_max'"
                    :minLength="1"
                    :maxLength="2"
                    :step="1"
                    :minValue="1"
                    :maxValue="99"
                />
            </div>
        </div>
    </div>
    <div class="mt-10 features flex justify-between flex-wrap gap-4">
        <input
            type="hidden"
            name="features"
            :value="selectedFeatures.join(',')"
            x-bind:value="selectedFeatures.join(',')"
        />

        @foreach($features as $feature)
            <div
                class="feature shadow-card border-rounded w-[150px] h-[100px] flex justify-center items-center cursor-pointer"
                :class="isFeatureSelected('{{ $feature->id }}') ? 'bg-primary' : 'bg-white'"
                @click="toggleFeature('{{ $feature->id }}')"
            >
                <div>
                    <img
                        src="{{ ImagePathResolver::resolve($feature->icon) ?? asset('assets/images/icons/gym.png') }}"
                        alt="{{ $feature->name }}"
                        class="m-auto"
                    />
                    <p
                        class="modal-subtitle text-center"
                        :class="isFeatureSelected('{{ $feature->id }}') ? 'text-white' : 'text-primary'"
                    >
                        {{ $feature->name }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function features() {
        return {
            selectedFeatures: [],
            allFeatures: @json($features),

            toggleFeature(feature) {
                if (this.selectedFeatures.includes(feature)) {
                    this.selectedFeatures = this.selectedFeatures.filter(f => f !== feature);
                } else {
                    this.selectedFeatures.push(feature);
                }
            },

            isFeatureSelected(feature) {
                return this.selectedFeatures.includes(feature);
            },

            resetFeatures() {
                this.selectedFeatures = [];
            },

            selectedFeatureNames(locale) {
                return this.selectedFeatures.map(id => {
                    const feature = this.allFeatures.find(feature => feature.id == id);
                    return feature ? feature.name[locale] : '';
                });
            }
        }
    }
</script>
