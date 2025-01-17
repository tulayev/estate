<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function locations(Request $request)
    {
        $query = $request->get('q', '');
        $locations = Hotel::locations();

        if ($query) {
            $locations->where('location', 'like', '%' . $query . '%');
        }

        $locations = $locations->limit(10)->get();

        return response()
            ->json($locations);
    }
}
