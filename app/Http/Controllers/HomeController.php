<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Type;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $hotels = Hotel::active()
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $types = Type::all();

        return view('pages.home.index', [
            'hotels' => $hotels,
            'types' => $types,
        ]);
    }
}
