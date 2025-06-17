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

    /* Prevent page scrolling */
    body {
        overflow: hidden;
    }
</style>
<main class="pt-8 sm:pt-16 md:pt-24 lg:pt-44 h-screen overflow-hidden">
    <div class="container">
        <div class="w-full flex justify-between">
            <h2 class="section-title">{{ __('listing/index/list.for_sale_off_plan') }}</h2>
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
            <x-ui.switcher-panel.toggle-view />
        </div>
    </div>

    @if ($hotels->isNotEmpty())
        <!-- Map View -->
        <div
            class="mt-4 md:mt-6 xl:mt-12 relative h-[calc(100vh-9rem)] md:h-[calc(100vh-16rem)]"
            x-data="mapViewHandler()"
            x-init="initMapView()"
        >
            <!-- Desktop View -->
            <div class="absolute top-auto left-auto bottom-4 md:top-4 md:left-4 md:bottom-auto w-full md:h-full z-[999]">
                <div id="dynamicCardContainer"></div>

                <div
                    class="flex md:block w-full md:w-2/5 h-full overflow-x-auto overflow-y-hidden md:overflow-x-hidden md:overflow-y-auto no-scrollbar space-x-4 md:space-x-0 space-y-0 md:space-y-4"
                    x-ref="hotelList"
                >
                    @foreach($hotels as $hotel)
                        <div
                            id="hotel_{{ $hotel->id }}"
                            @click="handleHotelClick({{ $hotel }})"
                            class="transition-all duration-300 cursor-pointer"
                        >
                            <x-pages.listing.map.card
                                :hotel="$hotel"
                            />
                        </div>
                    @endforeach
                </div>
            </div>

            <div id="mapView" class="border-rounded w-full h-full"></div>
        </div>
    @else
        <x-ui.nothing-found
            :title="__('general.nothing_found')"
            :message="__('general.search_try_again')"
            :showSearchTips="true"
            :backUrl="route('pages.listing.index')"
        />
    @endif
</main>

<script defer>
    function mapViewHandler() {
        return {
            locale: '{{ app()->getLocale() }}',
            map: null,
            markers: {},
            clickStates: {},
            lastClickedHotelId: null,

            initMapView() {
                // Initialize the map without zoom control
                this.map = L.map('mapView', {
                    center: [7.8804, 98.3923],
                    zoom: 8,
                    minZoom: 2,
                    maxZoom: 18,
                    attributionControl: false,
                    zoomControl: false,
                });

                // Add zoom control to the bottom-right corner
                L.control.zoom({
                    position: 'topright'
                }).addTo(this.map);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attributionControl: false
                }).addTo(this.map);
            },

            handleHotelClick(hotel) {
                const id = hotel.id;

                if (this.lastClickedHotelId !== id) {
                    // Reset previous hotel click state
                    if (this.lastClickedHotelId !== null) {
                        this.clickStates[this.lastClickedHotelId] = 0;
                    }
                    this.lastClickedHotelId = id;
                }

                if (!this.clickStates[id]) {
                    // First click: show marker
                    this.addMarker(hotel);
                    this.clickStates[id] = 1;
                } else {
                    // Second click: go to hotel page
                    window.location.href = `/listings/${hotel.slug}`;
                }
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

                this.map.flyTo([lat, lng], 15);
                this.markers[hotel.id] = marker;
            },

            validate(lat, lng) {
                return !isNaN(parseFloat(lat)) && !isNaN(parseFloat(lng));
            },

            async fetchAndAppendCard(hotelId) {
                try {
                    const response = await fetch(`/listings/map-view/${hotelId}`, {
                        method: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                    });

                    if (response.ok) {
                        const html = await response.text();
                        const dynamicContainer = document.getElementById('dynamicCardContainer');
                        dynamicContainer.innerHTML = '';
                        dynamicContainer.insertAdjacentHTML('beforeend', html);

                        dynamicContainer.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start',
                        });
                    } else {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                } catch (error) {
                    console.error('Error fetching card data:', error.response || error.message);
                }
            }
        };
    }
</script>
