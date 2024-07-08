<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tour;
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
