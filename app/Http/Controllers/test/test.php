<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class test extends Controller
{
    public function index(){
        return response()->json([
            'status' => 200,
            'up' => true,
        ]);
    }
}
