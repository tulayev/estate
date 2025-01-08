@props([
    'features' => null,
])

<div x-data="features()">
    <h3 class="mt-40 modal-subtitle text-primary">
        Facilities
        <span
            class="font-700"
        >
            |
        </span>
        <span
            class="font-400 cursor-pointer hover:text-red-500 hover:font-900"
            @click="resetFeatures"
        >
            x
        </span>
        <span
            id="selectedFeatures"
            x-text="selectedFeatures.join(', ')"
        ></span>
    </h3>
    <div class="mt-12 uk-child-width-1-2" uk-grid>
        <div>
            <h4 class="modal-subtitle text-secondary">bathrooms</h4>
            <div class="shadow-feature-card rounded-[25px] mt-3 px-14 py-7 flex items-center justify-between">
                <img src="{{ asset('assets/images/bath.png') }}" alt="bath" />
                <x-ui.filters.ranges.bath-range
                    :fromInputName="'bath_from'"
                    :toInputName="'bath_to'"
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
            <div class="shadow-feature-card rounded-[25px] mt-3 px-14 py-7 flex items-center justify-between">
                <img src="{{ asset('assets/images/bed.png') }}" alt="bed" />
                <x-ui.filters.ranges.bed-range
                    :fromInputName="'bed_from'"
                    :toInputName="'bed_to'"
                    :minLength="1"
                    :maxLength="2"
                    :step="1"
                    :minValue="1"
                    :maxValue="99"
                />
            </div>
        </div>
    </div>
    <div class="mt-10 features flex flex-wrap gap-4">
        @foreach($features as $feature)
            <div
                class="feature mr-9 shadow-feature-card rounded-[25px] w-[170px] h-[145px] flex justify-center items-center cursor-pointer"
                :class="isFeatureSelected('{{ $feature->name }}') ? 'bg-primary' : 'bg-white'"
                @click="toggleFeature('{{ $feature->name }}')"
            >
                <div>
                    <img
                        src="{{ ImagePathResolver::resolve($feature->icon) ?? asset('assets/images/gym.png') }}"
                        alt="{{ $feature->name }}"
                        class="m-auto"
                    />
                    <p
                        class="modal-subtitle text-center"
                        :class="isFeatureSelected('{{ $feature->name }}') ? 'text-white' : 'text-primary'"
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

            toggleFeature(feature) {
                if (this.selectedFeatures.includes(feature)) {
                    this.selectedFeatures = this.selectedFeatures.filter(f => f !== feature);
                } else {
                    this.selectedFeatures.push(feature);
                }
            },

            isFeatureSelected(featureName) {
                return this.selectedFeatures.includes(featureName);
            },

            resetFeatures() {
                this.selectedFeatures = [];
            }
        }
    }
</script>
