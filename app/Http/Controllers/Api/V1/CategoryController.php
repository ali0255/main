<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function store(NewCategoryRequest $request)
    {
        $category = category::query()->create([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
        ]);

        return response()->json([
            'data' => new CategoryResource($category)
        ])->setStatusCode(201);
    }


    public function update(Category $category, Request $request)
    {


        $category->update([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id'),
        ]);

        return response()->json([
            'data' => new CategoryResource($category)
        ])->setStatusCode(200);

    }

    public function show()
    {

        return response()->json([
            'data' => DB::select('SELECT * FROM `categories` WHERE category_id IS NULL')
        ])->setStatusCode(200);

    }

    public function showchild()
    {
        $categories = Category::with('parnt')->whereNull('category_id')->get();
        $data = [];

        foreach ($categories as $category) {
            $children = [];

            foreach ($category->children as $child) {
                $children[] = $child->title;
            }

            $data[] = [
                'category' => $category->title,
                'parent' => $category->parent ? $category->parent->title : null,
                'children' => $children,
            ];
        }

        return response()->json([
            'data' => $data
        ])->setStatusCode(200);

    }

    public function destroy(Category $category)
    {


        $category->delete();
        return response()->json([
            'message' => 'deleted category'
        ])->setStatusCode(200);

    }
}
