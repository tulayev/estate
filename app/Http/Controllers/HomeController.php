<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $hotels = Hotel::active()
            ->ieVerified()
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('pages.home.index', [
            'hotels' => $hotels,
        ]);
    }
}
