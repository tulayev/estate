<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelLike;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $hotels = Hotel::active()->get();

        return view('pages.listing.index', [
            'hotels' => $hotels,
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
}
