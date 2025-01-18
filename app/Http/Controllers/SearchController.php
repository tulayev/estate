<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /* API call only */
    public function locations(Request $request): JsonResponse
    {
        $query = $request->get('q', '');
        $locations = Hotel::locations();

        if ($query) {
            $locations->where('location', 'like', '%' . $query . '%');
        }

        $locations = $locations->limit(10)->get();

        return response()
            ->json($locations);
    }

    public function count(Request $request): JsonResponse
    {
        $count = $this->applyFilters($request)->count();

        return response()->json([
            'count' => $count,
        ]);
    }

    private function applyFilters(Request $request)
    {
        return Hotel::query()
            ->with(['floors', 'types', 'tags', 'features'])
            ->search($request->input('search'))
            ->filterByPrice($request->input('price_min'), $request->input('price_max'))
            ->filterByBedrooms($request->input('bedrooms_min'), $request->input('bedrooms_max'))
            ->filterByBathrooms($request->input('bathrooms_min'), $request->input('bathrooms_max'))
            ->filterByTypes($request->input('types'))
            ->filterByTags($request->input('tags'))
            ->filterByFeatures($request->input('features'))
            ->active();
    }
}
