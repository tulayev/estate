<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Hotel;
use App\Models\HotelLike;
use App\Models\Tag;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all();
        $features = Feature::all();

        $hotels = Hotel::query()
            ->with(['floors', 'tags', 'features'])
            ->search($request->input('search'))
            ->filterByPrice($request->input('price_min'), $request->input('price_max'))
            ->filterByBedrooms($request->input('bedrooms_min'), $request->input('bedrooms_max'))
            ->filterByBathrooms($request->input('bathrooms_min'), $request->input('bathrooms_max'))
            ->filterByTags($request->input('tags', []))
            ->filterByFeatures($request->input('features', []))
            ->active()
            ->get();

        return view('pages.listing.index', [
            'hotels' => $hotels,
            'tags' => $tags,
            'features' => $features,
        ]);
    }

    public function show($slug)
    {
        $hotel = Hotel::active()->where('slug', $slug)->first();

        if (!$hotel) {
            abort(404);
        }

        return view('pages.listing.show', [
            'hotel' => $hotel,
        ]);
    }

    public function like(Request $request, $hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);

        if (!$hotel) {
            return response()
                ->json(['message' => 'Object not found'], 404);
        }

        $userId = auth()->check() ? auth()->user()->id : null;
        $ipAddress = $request->ip();

        // Check if the user/IP has already liked the hotel
        $existingLike = HotelLike::where('hotel_id', $hotelId)
            ->when($userId, function ($query) use ($userId) {
                $query->where('liked_by', $userId);
            })
            ->when(!$userId, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->first();

        if ($existingLike) {
            // Remove the existing like
            $existingLike->delete();

            return response()
                ->json(['message' => 'Like removed successfully']);
        }

        HotelLike::create([
            'hotel_id' => $hotelId,
            'liked_by' => $userId,
            'ip_address' => $userId ? null : $ipAddress,
        ]);

        return response()
            ->json(['message' => 'Object liked successfully'], 201);
    }

    public function likes($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);

        if (!$hotel) {
            return response()
                ->json(['message' => 'Object not found'], 404);
        }

        $likesCount = $hotel->likes()->count();

        return response()
            ->json(['likes_count' => $likesCount]);
    }

    public function likedByUser(Request $request)
    {
        $userId = auth()->check() ? auth()->user()->id : null;
        $ipAddress = $request->ip();

        // Fetch the hotels liked by the user or their IP address
        $likedHotels = HotelLike::query()
            ->when($userId, function ($query) use ($userId) {
                $query->where('liked_by', $userId);
            })
            ->when(!$userId, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->with('hotel')
            ->get();

        return response()->json($likedHotels);
    }
}
