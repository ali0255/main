<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Tour $tour)
    {
        auth()->user()->likeTour($tour);

        return response()->json([
            'links_count' => auth()->user()->likes()->count()
        ], 200);
    }
}
