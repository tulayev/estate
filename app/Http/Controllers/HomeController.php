<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::active()
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('pages.home.index', [
            'hotels' => $hotels,
        ]);
    }
}
