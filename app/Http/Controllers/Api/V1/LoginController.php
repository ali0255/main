<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;

class LoginController extends Controller
{
    use HasApiTokens;

    public function store(Request $request)
    {
        /**
         * @var User $user
         */
        $user = User::query()->where('phone', $request->get('phone'))->first();

        if (!$user) {
            return response()->json([
                'status' => 400,
                'data' => [
                    'message' => 'User not found'
                ]
            ])->setStatusCode(400);
        }

//        $user->tokens()->delete(); // استفاده از تابع tokens()
        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'status' => 201,
            'data' => [
                'message' => 'Token created successfully',
                'token' => $token
            ]
        ])->setStatusCode(201);
    }

    public function destroy(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete(); // استفاده از تابع tokens()

        return response()->json([
            'status' => 200,
            'data' => [
                'message' => 'You have been logged out'
            ]
        ])->setStatusCode(200);
    }
}
