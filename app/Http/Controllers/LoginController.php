<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        /**
         * @var User $user
         */
        $user = User::query()->where('PhoneNumber', $request->get('PhoneNumber'))->first();

        if (!$user || !Hash::check($request->get('password'), $user->password)) {
            return response()->json([
                'data' => [
                    'message' => 'Invalid email or password'
                ]
            ])->setStatusCode(400);
        }

        $user->tokens()->delete(); // استفاده از تابع tokens()
        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'data' => [
                'token' => $token
            ]
        ])->setStatusCode(200);
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete(); // استفاده از تابع tokens()

        return response()->json([
            'data' => [
                'message' => 'You have been logged out'
            ]
        ])->setStatusCode(200);
    }
}
