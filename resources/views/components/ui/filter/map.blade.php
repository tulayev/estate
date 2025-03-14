@props([
    'locations' => null
])

<div
    class="mt-4 sm:mt-6 md:mt-10 xl:mt-16"
    x-data="mapHandler()"
    x-init="initMap()"
>
    <h3 class="modal-subtitle text-primary">
        {{ __('general.filter_popup_location') }}
        <span class="font-bold">|</span>
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black" @click="resetLocations">x</span>
        <span x-text="selectedLocationNames().join(', ')"></span>
    </h3>

    <div id="map" class="border-rounded w-full mt-4 sm:mt-6 h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] xl:h-[700px]"></div>

    <input
        type="hidden"
        name="locations"
        :value="selectedLocations.map(l => l.id).join(',')"
    />

    <div class="mt-6 sm:mt-8 md:mt-10 locations uk-child-width-1-2 uk-child-width-auto@s uk-grid-small" uk-grid>
        @foreach($locations as $location)
            <div>
                <div
                    class="location flex justify-center items-center cursor-pointer modal-subtitle shadow-card border-rounded p-2 sm:p-4 md:px-6 md:py-8"
                    :class="isLocationSelected('{{ $location->id }}') ? 'bg-primary text-white' : 'bg-white text-primary'"
                    @click="toggleLocation('{{ $location->id }}', '{{ $location->latitude }}', '{{ $location->longitude }}', '{{ $location->name }}')"
                >
                    {{ Str::limit($location->name, 12) }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script defer>
    function mapHandler() {
        return {
            locale: '{{ app()->getLocale() }}',
            map: null,
            markers: {},
            selectedLocations: [],
            allLocations: @json($locations),

            initMap() {
                this.map = L.map('map', {
                    center: [7.8804, 98.3923],
                    zoom: 8,
                    minZoom: 2,
                    maxZoom: 18,
                    attributionControl: false
                });

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attributionControl: false
                }).addTo(this.map);

                this.addAllMarkers();
            },

            reverseGeoJsonCoordinates(coordinates) {
                return coordinates.map(c => [c[1], c[0]]);
            },

            addAllMarkers() {
                this.allLocations.forEach(l => {
                    if (this.validate(l.latitude, l.longitude)) {
                        this.addMarker(l.latitude, l.longitude, l.name[this.locale]);
                    }
                });
            },

            zoomToMarker(lat, lng, zoomLevel = 15) {
                this.map.flyTo([lat, lng], zoomLevel);
            },

            addMarker(lat, lng, name) {
                if (!this.map) {
                    console.error("Map is not initialized");
                    return;
                }

                const key = `${lat},${lng}`;
                if (!this.markers[key]) {
                    const marker = L.marker([lat, lng])
                        .addTo(this.map)
                        .bindTooltip(name, {
                            permanent: true,
                            direction: 'top',
                            className: 'marker-tooltip'
                        });

                    marker.on('click', () => {
                        this.zoomToMarker(lat, lng);
                    });

                    this.markers[key] = marker;
                }
            },

            removeMarker(lat, lng) {
                if (!this.map) {
                    console.error("Map is not initialized");
                    return;
                }

                const key = `${lat},${lng}`;
                if (this.markers[key]) {
                    this.markers[key].unbindPopup();
                    this.map.removeLayer(this.markers[key]);
                    delete this.markers[key];
                }
            },

            validate(lat, lng) {
                lat = parseFloat(lat);
                lng = parseFloat(lng);

                if (isNaN(lat) || isNaN(lng)) {
                    console.error("Invalid coordinates:", lat, lng);
                    return false;
                }

                return true;
            },

            toggleLocation(id, lat, lng, name) {
                if (!this.validate(lat, lng)) {
                    return;
                }

                if (this.isLocationSelected(id)) {
                    this.selectedLocations = this.selectedLocations.filter(l => l.id !== id);
                    this.removeMarker(lat, lng);
                } else {
                    this.selectedLocations.push({ id, lat, lng, name });
                    this.zoomToMarker(lat, lng);
                }
            },

            isLocationSelected(id) {
                return this.selectedLocations.some(l => l.id == id);
            },

            resetLocations() {
                Object.values(this.markers).forEach(marker => {
                    this.map.removeLayer(marker);
                });
                this.markers = {};
                this.selectedLocations = [];
            },

            selectedLocationNames() {
                return this.selectedLocations.map(({ id }) => {
                    const location = this.allLocations.find(l => l.id == id);
                    return location ? location.name[this.locale] : '';
                });
            },
        };
    }
</script>
