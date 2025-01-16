@props([
    'locations' => null
])

<div x-data="mapHandler()" x-init="initMap()">
    <h3 class="mt-16 modal-subtitle text-primary">
        Location
        <span class="font-bold">|</span>
        <span class="font-normal cursor-pointer hover:text-red-500 hover:font-black">x</span>
    </h3>
    <div class="mt-10 features flex flex-wrap gap-4">
        @foreach($locations as $location)
            <div
                class="location flex justify-center items-center cursor-pointer modal-subtitle shadow-card border-rounded w-[300px] h-[100px]"
                :class="isLocationSelected('{{ $location->latitude }}', '{{ $location->longitude }}') ? 'bg-primary' : 'bg-white'"
                @click="toggleLocation('{{ $location->latitude }}', '{{ $location->longitude }}', '{{ $location->location }}')"
            >
                {{ $location->location }}
            </div>
        @endforeach
    </div>

    <div id="map" class="border-rounded w-full h-[700px] mt-6"></div>
</div>

<script>
    function mapHandler() {
        return {
            map: null,
            markers: [],
            selectedLocations: [], // Track selected locations

            // Initialize the map
            initMap() {
                this.map = L.map('map').setView([0, 0], 2); // Default center and zoom level

                // Add a tile layer (using OpenStreetMap tiles)
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap contributors'
                }).addTo(this.map);
            },

            // Add location markers to the map and toggle their selection
            toggleLocation(lat, lng, name) {
                // Validate lat/lng
                if (!lat || !lng || isNaN(lat) || isNaN(lng)) {
                    console.error('Invalid coordinates:', lat, lng);
                    return; // Exit if coordinates are invalid
                }

                // Toggle location in the selectedLocations array
                if (this.isLocationSelected(lat, lng)) {
                    this.selectedLocations = this.selectedLocations.filter(
                        loc => loc.lat !== lat || loc.lng !== lng
                    );
                } else {
                    this.selectedLocations.push({ lat, lng, name });
                }

                // Add or remove the marker on the map
                this.updateMapMarkers(lat, lng, name);
            },

            // Check if location is already selected
            isLocationSelected(lat, lng) {
                return this.selectedLocations.some(loc => loc.lat === lat && loc.lng === lng);
            },

            // Update map markers based on selected locations
            updateMapMarkers(lat, lng, name) {
                // Check if marker already exists
                const existingMarker = this.markers.find(marker =>
                    marker.getLatLng().lat === lat && marker.getLatLng().lng === lng
                );

                if (this.isLocationSelected(lat, lng) && !existingMarker) {
                    // Create a new marker
                    const newMarker = L.marker([lat, lng]).bindPopup(name).addTo(this.map);
                    this.markers.push(newMarker);
                } else if (!this.isLocationSelected(lat, lng) && existingMarker) {
                    // Remove the marker
                    this.map.removeLayer(existingMarker);
                    this.markers = this.markers.filter(marker =>
                        marker.getLatLng().lat !== lat || marker.getLatLng().lng !== lng
                    );
                }
            }
        };
    }
</script>

<style>
    .location.bg-primary {
        background-color: #007bff;
        color: white;
    }

    .location.bg-white {
        background-color: white;
        color: black;
    }
</style>
