@props([
    'locations' => null
])

<div x-data="mapHandler()" x-init="initMap()">
    <h3 class="mt-16 modal-subtitle text-primary">
        Location
        <span class="font-bold">|</span>
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black" @click="resetLocations">x</span>
        <span x-text="selectedLocationsString().join(', ')"></span>
    </h3>
    <div class="mt-10 features flex justify-between flex-wrap gap-4">
        @foreach($locations as $location)
            <div
                class="location flex justify-center items-center cursor-pointer modal-subtitle shadow-card border-rounded w-[250px] h-[90px]"
                :class="isLocationSelected('{{ $location->latitude }}', '{{ $location->longitude }}') ? 'bg-primary text-white' : 'bg-white text-primary'"
                @click="toggleLocation('{{ $location->latitude }}', '{{ $location->longitude }}', '{{ $location->location }}')"
            >
                {{ $location->location }}
            </div>
        @endforeach
    </div>

    <div id="map" class="border-rounded w-full h-[500px] mt-6"></div>
</div>

<script>
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

            toggleLocation(lat, lng, name) {
                if (!this.validate(lat, lng)) {
                    return;
                }

                if (this.isLocationSelected(lat, lng)) {
                    // Remove from selected locations
                    this.selectedLocations = this.selectedLocations.filter(
                        loc => loc.lat !== lat || loc.lng !== lng
                    );
                    this.removeMarker(lat, lng); // Remove marker
                } else {
                    // Add to selected locations
                    this.selectedLocations.push({ lat, lng, name });
                    this.addMarker(lat, lng, name); // Add marker
                    this.zoomToMarker(lat, lng); // Zoom to marker
                }
            },

            isLocationSelected(lat, lng) {
                return this.selectedLocations.some(loc => loc.lat == lat && loc.lng == lng);
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
