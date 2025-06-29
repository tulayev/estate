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
        <span
            class="font-normal cursor-pointer hover:text-red-500 hover:font-black"
            @click="resetLocations"
        >
            x
        </span>
        <span>
            <template
                x-for="(name, index) in selectedLocationNames()"
                :key="index"
            >
                <span
                    class="cursor-pointer hover:text-red-500"
                    @click="removeLocation(selectedLocations.map(l => l.id)[index])"
                    x-text="name + (index < selectedLocationNames().length - 1 ? ', ' : '')"
                ></span>
            </template>
        </span>
    </h3>

    <div
        id="map"
        class="relative border-rounded w-full mt-4 sm:mt-6 h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] xl:h-[700px]"
    >
        <div
            class="absolute bottom-4 left-4 right-4 z-[999]"
            x-show="selectedLocations.length > 0"
        >
            <div class="flex bg-white border-rounded">
                <div class="hidden md:flex w-1/5 bg-primary border-rounded justify-center items-center p-2">
                    <h3
                        class="section-title-white md:text-lg text-center"
                        x-text="selectedLocations.length > 0 ? selectedLocations[selectedLocations.length - 1].name[locale] : ''"
                    ></h3>
                </div>
                <div class="w-4/5 px-4 py-6">
                    <p
                        class="text-sm sm:text-base xl:text-lg"
                        x-text="selectedLocations.length > 0 ? selectedLocations[selectedLocations.length - 1].description[locale] : ''"
                    ></p>
                </div>
            </div>
        </div>
    </div>

    <input
        id="locations"
        type="hidden"
        name="locations"
        :value="selectedLocations.map(l => l.id).join(',')"
    />

    <div class="mt-6 sm:mt-8 md:mt-10 locations uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-small" uk-grid>
        <template x-for="(location, index) in visibleLocations" :key="location.id">
            <div>
                <div
                    class="location flex justify-center items-center cursor-pointer modal-subtitle shadow-card border-rounded p-2 sm:p-4 md:px-6 md:py-8"
                    :class="isLocationSelected(location.id) ? 'bg-primary text-white' : 'bg-white text-primary'"
                    @click="toggleLocation(location.id, location.latitude, location.longitude, location.name, location.description)"
                >
                    <span x-text="limitText(location.name[locale], 12)"></span>
                </div>
            </div>
        </template>
    </div>

    <div
        class="w-full flex justify-center mt-4 md:mt-6 xl:mt-10"
    >
        <button
            type="button"
            @click.prevent="toggleShowMore"
            class="bg-white text-primary rounded-[100px] modal-subtitle py-5 w-full hover:text-white hover:bg-primary"
            x-text="showingAll ? '{{ __('general.show_less') }}' : '{{ __('general.show_more') }}'"
            x-show="allLocations.length > defaultVisibleCount"
        >
        </button>
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
            defaultVisibleCount: 12,
            showingAll: false,

            get visibleLocations() {
                return this.showingAll ? this.allLocations : this.allLocations.slice(0, this.defaultVisibleCount);
            },

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
                    // Create custom icon using the PNG image
                    const customIcon = L.icon({
                        iconUrl: '/assets/images/icons/location-marker-dark.png',
                        iconSize: [32, 40], // size of the icon
                        iconAnchor: [16, 32], // point of the icon which will correspond to marker's location
                        popupAnchor: [0, -32], // point from which the popup should open relative to the iconAnchor
                        tooltipAnchor: [0, -32] // point from which the tooltip should open relative to the iconAnchor
                    });

                    const marker = L.marker([lat, lng], { icon: customIcon })
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

            toggleLocation(id, lat, lng, name, description) {
                if (!this.validate(lat, lng)) {
                    return;
                }

                if (this.isLocationSelected(id)) {
                    this.selectedLocations = this.selectedLocations.filter(l => l.id !== id);
                    this.removeMarker(lat, lng);
                } else {
                    this.selectedLocations.push({ id, lat, lng, name, description });
                    this.zoomToMarker(lat, lng);
                }
            },

            isLocationSelected(id) {
                return this.selectedLocations.some(l => l.id == id);
            },

            removeLocation(id) {
                this.selectedLocations = this.selectedLocations.filter(l => l.id !== id);
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

            toggleShowMore() {
                this.showingAll = !this.showingAll;
            },

            limitText(text, length) {
                return text.length > length ? text.substring(0, length) + '...' : text;
            },
        };
    }
</script>
