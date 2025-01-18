<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Hotel;
use App\Models\HotelLike;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ListingController extends Controller
{
    public function index(): View
    {
        $types = Type::all();
        $tags = Tag::all();
        $features = Feature::all();
        $hotels = Hotel::all();

        return view('pages.listing.index', [
            'hotels' => $hotels,
            'types' => $types,
            'tags' => $tags,
            'features' => $features,
        ]);
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

            return response()->json([
                'message' => 'Like removed successfully'
            ]);
        }

        HotelLike::create([
            'hotel_id' => $hotelId,
            'liked_by' => $userId,
            'ip_address' => $userId ? null : $ipAddress,
        ]);

        return response()->json([
            'message' => 'Object liked successfully'
        ], 201);
    }

    public function likes($hotelId): JsonResponse
    {
        $hotel = Hotel::findOrFail($hotelId);

        if (!$hotel) {
            return response()
                ->json(['message' => 'Object not found'], 404);
        }

        $likesCount = $hotel->likes()->count();

        return response()->json([
            'likes_count' => $likesCount
        ]);
    }

    public function likedByUser(Request $request): JsonResponse
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
