@props([
    'hotels' => null,
])
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
<main class="pt-8 sm:pt-16 md:pt-24 lg:pt-44">
    <div class="container">
        <div class="w-full flex justify-between">
            <div class="collapse-title">
                {{ __('listing/index/list.for_sale_off_plan') }}
                @if (request()->has('sort'))
                    <span class="normal-case ml-4 font-normal">
                        @switch(request()->get('sort'))
                            @case('title_asc')
                                Title Ascending
                                @break
                            @case('title_desc')
                                Title Descending
                                @break
                            @case('price_asc')
                                Price Low to High
                                @break
                            @case('price_desc')
                                Price High to Low
                                @break
                        @endswitch
                    </span>
                @endif
            </div>

            <x-ui.switcher-panel.toggle-view />
        </div>
    </div>

    @if ($hotels)
        <!-- Map View -->
        <div
            class="mt-4 md:mt-6 xl:mt-12 relative"
            x-data="mapViewHandler({{ $hotels->toJson() }})"
            x-init="initMapView()"
        >
            <div class="absolute top-4 left-4 w-1/2 md:w-[40%] space-y-4 h-[100%] overflow-y-auto z-[999] no-scrollbar">
                <div id="dynamicCardContainer" class="space-y-4"></div>

                <div x-ref="hotelList">
                    @foreach($hotels as $hotel)
                        <div
                            id="hotel_{{ $hotel->id }}"
                            @click="selectHotel({{ $hotel->id }})"
                            class="transition-all duration-300 mb-2"
                        >
                            <x-pages.listing.index.map-view.card
                                :hotel="$hotel"
                            />
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="mapView" class="border-rounded w-[100vw] h-[100vh]"></div>
        </div>
    @endif
</main>

<script defer>
    function mapViewHandler(hotels) {
        return {
            locale: '{{ app()->getLocale() }}',
            map: null,
            markers: {},
            selectedHotel: null,

            initMapView() {
                // Initialize the map without zoom control
                this.map = L.map('mapView', {
                    center: [7.8804, 98.3923],
                    zoom: 8,
                    minZoom: 2,
                    maxZoom: 18,
                    attributionControl: false,
                    zoomControl: false // Disable default zoom control
                });

                // Add zoom control to the bottom-right corner
                L.control.zoom({
                    position: 'topright'
                }).addTo(this.map);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attributionControl: false
                }).addTo(this.map);

                // Add markers for hotels
                hotels.forEach((hotel) => {
                    if (this.validate(hotel.latitude, hotel.longitude)) {
                        this.addMarker(hotel);
                    }
                });
            },

            addMarker(hotel) {
                const { latitude: lat, longitude: lng, title } = hotel;

                const marker = L.marker([lat, lng])
                    .addTo(this.map)
                    .bindTooltip(title, {
                        permanent: true,
                        direction: "top",
                        className: "marker-tooltip",
                    });

                // On marker click, fetch and append card
                marker.on("click", () => {
                    this.fetchAndAppendCard(hotel.id);
                    this.map.flyTo([lat, lng], 15); // Smooth zoom animation
                });

                this.markers[hotel.id] = marker;
            },

            async fetchAndAppendCard(hotelId) {
                try {
                    const response = await axios.get(`/listings/map-view/${hotelId}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    if (response.status === 200) {
                        const dynamicContainer = document.getElementById('dynamicCardContainer');
                        dynamicContainer.innerHTML = '';

                        dynamicContainer.insertAdjacentHTML("beforeend", response.data);

                        dynamicContainer.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                        });
                    }
                } catch (error) {
                    console.error("Error fetching card data:", error.response || error.message);
                }
            },

            validate(lat, lng) {
                return !isNaN(parseFloat(lat)) && !isNaN(parseFloat(lng));
            },
        };
    }
</script>
