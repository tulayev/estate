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
        <span x-text="selectedLocationsString().join(', ')"></span>
    </h3>

    <div id="map" class="border-rounded w-full mt-4 sm:mt-6 h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] xl:h-[700px]"></div>

    <input
        type="hidden"
        name="locations"
        :value="selectedLocationsString().join(',')"
    />

    <div class="mt-6 sm:mt-8 md:mt-10 features uk-child-width-1-2 uk-child-width-auto@s uk-grid-small" uk-grid>
        @foreach($locations as $location)
            <div>
                <div
                    class="location flex justify-center items-center cursor-pointer modal-subtitle shadow-card border-rounded p-2 sm:p-4 md:px-6 md:py-8"
                    :class="isLocationSelected('{{ $location->id }}') ? 'bg-primary text-white' : 'bg-white text-primary'"
                    @click="toggleLocation('{{ $location->id }}', '{{ $location->latitude }}', '{{ $location->longitude }}', '{{ $location->location }}')"
                >
                    {{ Str::limit($location->location, 12) }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script defer>
    function mapHandler() {
        return {
            map: null,
            markers: {}, // Store markers with keys as "lat,lng"
            selectedLocations: [], // Track selected locations

            // Initialize the map
            initMap() {
                this.map = L.map('map', {
                    center: [0, 0],
                    zoom: 2,
                    minZoom: 2, // Prevent excessive zoom out
                    maxZoom: 18, // Optional: Limit zooming in
                    attributionControl: false
                });

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attributionControl: false
                }).addTo(this.map);
            },

            toggleLocation(id, lat, lng, name) {
                if (!this.validate(lat, lng)) {
                    return;
                }

                if (this.isLocationSelected(id)) {
                    // Remove from selected locations
                    this.selectedLocations = this.selectedLocations.filter(
                        loc => loc.id !== id
                    );
                    this.removeMarker(lat, lng); // Remove marker
                } else {
                    // Add to selected locations
                    this.selectedLocations.push({ id, lat, lng, name });
                    this.addMarker(lat, lng, name); // Add marker
                    this.zoomToMarker(lat, lng); // Zoom to marker
                }
            },

            isLocationSelected(id) {
                return this.selectedLocations.some(loc => loc.id == id);
            },

            zoomToMarker(lat, lng, zoomLevel = 15) {
                this.map.flyTo([lat, lng], zoomLevel); // Smooth zoom animation
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
                            permanent: true, // Tooltip is always visible
                            direction: 'top', // Position the text above the marker
                            className: 'marker-tooltip' // Optional: Custom styling
                        });

                    // Add click event to zoom to the marker
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
                    this.markers[key].unbindPopup(); // Ensure the popup is unbound
                    this.map.removeLayer(this.markers[key]); // Remove marker from the map
                    delete this.markers[key]; // Delete marker reference
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

            selectedLocationsString() {
                return this.selectedLocations.map(loc => loc.name);
            },

            resetLocations() {
                Object.values(this.markers).forEach(marker => {
                    this.map.removeLayer(marker);
                });
                this.markers = {};
                this.selectedLocations = [];
            },
        };
    }
</script>
