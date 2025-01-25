@props([
    'hotels' => null,
])

<section class="section">
    <div class="container">
        <div class="w-full flex justify-between">
            <div class="collapse-title">
                For sale | off plan
            </div>
            <div class="flex items-center space-x-2 md:space-x-4 xl:space-x-8">
                <a href="{{ route('pages.listing.index', ['viewType' => 'liked']) }}">
                    <img src="{{ asset('assets/images/icons/heart-red.svg') }}" alt="like-view" />
                </a>
                <a href="{{ route('pages.listing.map') }}">
                    <img src="{{ asset('assets/images/icons/map-view.png') }}" alt="map-view" />
                </a>
                <a href="{{ route('pages.listing.index', ['viewType' => 'list']) }}">
                    <img src="{{ asset('assets/images/icons/list-view.svg') }}" alt="list-view" />
                </a>
                <a href="{{ route('pages.listing.index', ['viewType' => 'grid']) }}">
                    <img src="{{ asset('assets/images/icons/grid-view.svg') }}" alt="grid-view" />
                </a>
                @php($sort = request()->get('sort') === 'title_asc' ? 'title_desc' : 'title_asc')
                <a href="{{ route('pages.listing.index', ['sort' => $sort]) }}">
                    <img src="{{ asset('assets/images/icons/sort-icon.svg') }}" alt="sort" />
                </a>
            </div>
        </div>
    </div>

    @if ($hotels)
        <!-- Map View -->
        <div
            class="mt-4 md:mt-6 xl:mt-12 relative"
            x-data="mapViewHandler({{ $hotels->toJson() }})"
            x-init="initMapView()"
        >
            <div class="absolute top-4 left-4 w-1/2 md:w-[40%] space-y-4 h-[100vh] overflow-y-scroll z-[999]">
                <div id="dynamicCardContainer" class="space-y-4"></div>

                <div x-ref="hotelList">
                    @foreach($hotels as $hotel)
                        <div
                            id="hotel_{{ $hotel->id }}"
                            @click="selectHotel({{ $hotel->id }})"
                            class="transition-all duration-300"
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
</section>

<script>
    function mapViewHandler(hotels) {
        return {
            locale: '{{ app()->getLocale() }}',
            map: null,
            markers: {},
            selectedHotel: null,

            initMapView() {
                // Initialize the map
                this.map = L.map("mapView", {
                    center: [0, 0],
                    zoom: 2,
                    minZoom: 2,
                    maxZoom: 18,
                    attributionControl: false,
                });

                L.tileLayer(
                    "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
                    { maxZoom: 19, attributionControl: false }
                ).addTo(this.map);

                // Add markers for hotels
                hotels.forEach((hotel) => {
                    if (this.validate(hotel.latitude, hotel.longitude)) {
                        this.addMarker(hotel);
                    }
                });
            },

            addMarker(hotel) {
                const { latitude: lat, longitude: lng, location } = hotel;

                const marker = L.marker([lat, lng])
                    .addTo(this.map)
                    .bindTooltip(location[this.locale], {
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
            }
        };
    }
</script>
