<div class="flex items-center space-x-2 md:space-x-4 xl:space-x-8">
    @if(str_contains(url()->current(), 'map-view'))
        <a href="{{ route('pages.listing.index', ['viewType' => 'liked']) }}">
            <img src="{{ asset('assets/images/icons/heart-blue.svg') }}" alt="like-view" />
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
        <a href="#">
            <img src="{{ asset('assets/images/icons/sort-icon.svg') }}" alt="sort" />
        </a>
        <ul
            class="border-rounded shadow-card p-4 space-y-2 text-primary"
            uk-dropdown="pos: bottom-right; animation: uk-animation-slide-top-small; duration: 400; mode: click"
        >
            <li>
                <a href="{{ route('pages.listing.map', ['sort' => 'title_asc']) }}">
                    Title Ascending
                </a>
            </li>
            <li>
                <a href="{{ route('pages.listing.map', ['sort' => 'title_desc']) }}">
                    Title Descending
                </a>
            </li>
            <li>
                <a href="{{ route('pages.listing.map', ['sort' => 'price_asc']) }}">
                    Price Low to High
                </a>
            </li>
            <li>
                <a href="{{ route('pages.listing.map', ['sort' => 'price_desc']) }}">
                    Price High to Low
                </a>
            </li>
        </ul>
    @else
        @php($queryParams = request()->query())
        <a href="{{ route('pages.listing.index', array_merge($queryParams, ['viewType' => 'liked'])) }}">
            <img src="{{ asset('assets/images/icons/heart-blue.svg') }}" alt="like-view" />
        </a>
        <a href="{{ route('pages.listing.map', $queryParams) }}">
            <img src="{{ asset('assets/images/icons/map-view.png') }}" alt="map-view" />
        </a>
        <a href="{{ route('pages.listing.index', array_merge($queryParams, ['viewType' => 'list'])) }}">
            <img src="{{ asset('assets/images/icons/list-view.svg') }}" alt="list-view" />
        </a>
        <a href="{{ route('pages.listing.index', array_merge($queryParams, ['viewType' => 'grid'])) }}">
            <img src="{{ asset('assets/images/icons/grid-view.svg') }}" alt="grid-view" />
        </a>
        <a href="#">
            <img src="{{ asset('assets/images/icons/sort-icon.svg') }}" alt="sort" />
        </a>
        <ul
            class="border-rounded shadow-card p-4 space-y-2 text-primary"
            uk-dropdown="pos: bottom-right; animation: uk-animation-slide-top-small; duration: 400; mode: click"
        >
            <li>
                <a href="{{ route('pages.listing.index', array_merge($queryParams, ['sort' => 'title_asc'])) }}">
                    Title Ascending
                </a>
            </li>
            <li>
                <a href="{{ route('pages.listing.index', array_merge($queryParams, ['sort' => 'title_desc'])) }}">
                    Title Descending
                </a>
            </li>
            <li>
                <a href="{{ route('pages.listing.index', array_merge($queryParams, ['sort' => 'price_asc'])) }}">
                    Price Low to High
                </a>
            </li>
            <li>
                <a href="{{ route('pages.listing.index', array_merge($queryParams, ['sort' => 'price_desc'])) }}">
                    Price High to Low
                </a>
            </li>
        </ul>
    @endif
</div>
