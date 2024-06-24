<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class user extends Controller
{
    public function get_me(Request $request){
        $token = $request->get('token');

        $user_id = explode("|", $token);

        $find = \App\Models\User::find($user_id[0]);

        return response()->json([
            'status' => 200,
            'data' => $find
        ]);
    }
}
