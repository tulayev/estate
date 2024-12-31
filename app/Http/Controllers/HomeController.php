<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::active()->get();

        return view('pages.home.index', [
            'hotels' => $hotels,
        ]);
    }
}
