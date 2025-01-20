<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $hotels = Hotel::active()
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('pages.home.index', [
            'hotels' => $hotels,
            'likedHotels' => $this->getLikedHotelsByUser($request),
        ]);
    }

    private function getLikedHotelsByUser(Request $request)
    {
        $userId = auth()->check() ? auth()->user()->id : null;
        $ipAddress = $request->ip();

        return Hotel::getLikedHotels($userId, $ipAddress);
    }
}
