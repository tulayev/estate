<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ClubController extends Controller
{
    public function index(): View
    {
        return view('pages.club.index');
    }
}
