<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewTourRequest;
use App\Http\Resources\TourResource;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function store(NewTourRequest $request)
    {
      $article = Tour::query()->create([
            'title' => $request->get('title'),
            'dec' => $request->get('dec'),
            'befor_dec' => $request->get('befor_dec'),
            'vendor_id' => $request->get('user_id'),
            'category_id' => $request->get('category_id'),
            'start_time' => $request->get('start_time'),
            'Mabdah' => $request->get('Mabdah'),
            'Maqsad' => $request->get('Maqsad'),
            'price' => $request->get('price'),
            'totaldays' => $request->get('totaldays'),
            'totaluser' => $request->get('totaluser'),
            'avg_age_min' => $request->get('avg_age_min'),
            'avg_age_max' => $request->get('avg_age_max'),
        ]);

        return response()->json([
            'data' => new TourResource($article)
        ])->setStatusCode(201);
    }


    public function update(Tour $tour,Request $request)
    {


        $tour->update([
            'title' => $request->get('title', $tour->title),
            'dec' => $request->get('dec', $tour->dec),
            'befor_dec' => $request->get('befor_dec', $tour->befor_dec),
            'vendor_id' => $request->get('user_id', $tour->vendor_id),
            'category_id' => $request->get('category_id', $tour->vendor_id),
            'start_time' => $request->get('start_time', $tour->start_time),
            'Mabdah' => $request->get('Mabdah', $tour->Mabdah),
            'Maqsad' => $request->get('Maqsad', $tour->Maqsad),
            'price' => $request->get('price', $tour->price),
            'totaldays' => $request->get('totaldays', $tour->totaldays),
            'totaluser' => $request->get('totaluser', $tour->totaluser),
            'avg_age_min' => $request->get('avg_age_min', $tour->avg_age_min),
            'avg_age_max' => $request->get('avg_age_max', $tour->avg_age_max),
        ]);

        return response()->json([
            'data' => new TourResource($tour)
        ])->setStatusCode(200);
    }

    public function show()
    {
        $tours = Tour::with('user:id,name')->get();

        return response()->json([
            'tours' => $tours->map(function ($tour) {
                return [
                    'id' => $tour->id,
                    'title' => $tour->title,
                    'dec' => $tour->dec,
                    'befor_dec' => $tour->befor_dec,
                    'start_time' => $tour->start_time,
                    'Mabdah' => $tour->Mabdah,
                    'Maqsad' => $tour->Maqsad,
                    'price' => $tour->price,
                    'user' => [
                        'name' => $tour->user->name
                    ]
                ];
            })
        ]);
    }



    public function index(Tour $tour)
    {
        return response()->json([
            'data' => new TourResource($tour),
            'datauser' => $tour->user->name,


        ])->setStatusCode(200);
    }

    public function destroy(Tour $tour)
    {

        $tour->delete();
        return response()->json([
            'data' => [
                'message' => 'Tour is delete'
            ]
        ])->setStatusCode(200);

    }

    public function indexcategory($Id)
{
    $category = Category::findOrFail($Id);
    $tours = $category->tours()->get();

     return response()->json([
        'data' => $tours
    ])->setStatusCode(200);
}


}
