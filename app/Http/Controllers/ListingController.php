<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelLike;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListingController extends Controller
{
    private const PAGINATION_PARAMS = [
        'grid' => 9,
        'list' => 3,
        'liked' => 6
    ];

    public function index(Request $request): View | string
    {
        $hotelsQuery = $this->getHotelsQuery($request);

        $viewType = $request->get('viewType', 'grid');
        $perPage = self::PAGINATION_PARAMS[$viewType];

        $hotels = $hotelsQuery->paginate($perPage);

        if ($request->ajax()) {
            return view('components.pages.listing.index.view-type.list', [
                'hotels' => $hotels,
                'viewType' => $viewType,
            ])->render();
        }

        return view('pages.listing.index', [
            'hotels' => $hotels,
            'viewType' => $viewType,
        ]);
    }

    public function mapView(Request $request): View
    {
        $hotelsQuery = $this->getHotelsQuery($request);

        return view('pages.listing.map', [
            'hotels' => $hotelsQuery->get(),
        ]);
    }

    public function mapViewShow(Request $request, $hotelId): string
    {
        $hotel = Hotel::active()->findOrFail($hotelId);

        if ($request->ajax()) {
            return view('components.pages.listing.index.map-view.selected-card', [
                'hotel' => $hotel,
            ])->render();
        }

        return '';
    }

    public function show($slug): View
    {
        $hotel = Hotel::active()
            ->where('slug', $slug)
            ->first();
        $similarHotels = Hotel::active()
            ->inRandomOrder()
            ->limit(10)
            ->get();

        if (!$hotel) {
            abort(404);
        }

        return view('pages.listing.show', [
            'hotel' => $hotel,
            'similarHotels' => $similarHotels,
        ]);
    }

    public function like(Request $request, $hotelId): JsonResponse
    {
        $hotel = Hotel::active()
            ->findOrFail($hotelId);

        if (!$hotel) {
            return response()
                ->json(['message' => 'Object not found'], 404);
        }

        $userId = auth()->check() ? auth()->user()->id : null;
        $ipAddress = $request->ip();

        $existingLike = HotelLike::where('hotel_id', $hotelId)
            ->when($userId, function ($query) use ($userId) {
                $query->where('liked_by', $userId);
            })
            ->when(!$userId, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->first();

        if ($existingLike) {
            $existingLike->delete();

            return response()
                ->json([], 204);
        }

        HotelLike::create([
            'hotel_id' => $hotelId,
            'liked_by' => $userId,
            'ip_address' => $userId ? null : $ipAddress,
        ]);

        return response()
            ->json([], 201);
    }

    public function hotelsCount(Request $request): JsonResponse
    {
        $count = $this->applyFilters($request)->count();

        return response()
            ->json(['count' => $count]);
    }

    public function searchLocations(Request $request): JsonResponse
    {
        $locale = app()->getLocale();
        $query = $request->get('q', '');
        $locations = Hotel::locations();

        if ($query) {
            $locations = $locations->whereRaw(
                "LOWER(JSON_UNQUOTE(JSON_EXTRACT(location, '$.\"{$locale}\"'))) LIKE ?",
                ['%' . strtolower($query) . '%']
            );
        }

        $locations = $locations->limit(10)->get();

        return response()
            ->json($locations);
    }

    private function applySearch(Request $request)
    {
        return Hotel::query()
            ->with(['floors', 'types', 'tags', 'features'])
            ->searchByTitle($request->input('title'))
            ->searchByLocations($request->input('location'))
            ->filterByBedrooms($request->input('beds'), $request->input('beds'))
            ->filterByPrice($request->input('price_min'), $request->input('price_max'))
            ->active();
    }

    private function applyFilters(Request $request)
    {
        return Hotel::query()
            ->with(['floors', 'types', 'tags', 'features'])
            ->searchByTitle($request->input('title'))
            ->filterByPrice($request->input('price_min'), $request->input('price_max'))
            ->filterByBedrooms($request->input('bedrooms_min'), $request->input('bedrooms_max'))
            ->filterByBathrooms($request->input('bathrooms_min'), $request->input('bathrooms_max'))
            ->filterByTypes($request->input('types'))
            ->filterByTags($request->input('tags'))
            ->filterByFeatures($request->input('features'))
            ->filterByLocations($request->input('locations'))
            ->active();
    }

    private function getHotelsQuery(Request $request)
    {
        // Search & Filter
        $hotelsQuery = $request->has('requestType') && $request->get('requestType') === 'search'
            ? $this->applySearch($request)
            : $this->applyFilters($request);

        if ($request->has('type')) {
            $hotelsQuery->filterByTypes($request->get('type'))
                ->active();
        }

        if ($request->has('viewType') && $request->get('viewType') === 'liked') {
            $hotelsQuery->whereHas('likes', function ($query) {
                $userId = auth()->id();
                $ipAddress = request()->ip();

                $query->when($userId, function ($query) use ($userId) {
                    $query->where('liked_by', $userId);
                })->when(!$userId, function ($query) use ($ipAddress) {
                    $query->where('ip_address', $ipAddress);
                });
            });
        }

        // Sorting
        if ($request->has('sort')) {
            $sort = $request->get('sort');
            switch ($sort) {
                case 'title_asc':
                    $hotelsQuery->orderBy('title', 'asc');
                    break;
                case 'title_desc':
                    $hotelsQuery->orderBy('title', 'desc');
                    break;
            }
        }

        return $hotelsQuery;
    }
}
