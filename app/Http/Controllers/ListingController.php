<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

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
}
