<?php

use App\Http\Controllers\Api\V1\CategoryController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/up', 'App\Http\Controllers\test\test@index');

Route::prefix('v1')->group(function () {
    Route::post('/login', 'App\Http\Controllers\Api\V1\LoginController@store');
    Route::post('/register', 'App\Http\Controllers\Api\V1\LoginController@store');
    Route::post('/get-me', 'App\Http\Controllers\Api\V1\user@get_me');

//    Route::post('/users/store',[\App\Http\Controllers\Api\V1\UserController::class,'store']);
//    Route::post('/users/update/{user}',[\App\Http\Controllers\Api\V1\UserController::class,'update']);
//    Route::get('/users/show',[\App\Http\Controllers\Api\V1\UserController::class,'show']);
//    Route::post('/users/login',[\App\Http\Controllers\Api\V1\LoginController::class,'login']);
//
//    Route::post('/categories/store',[CategoryController::class,'store']);
//    Route::post('/categories/update/{category}',[CategoryController::class,'update']);
//    Route::get('/categories/show',[CategoryController::class,'show']);
//    Route::get('/categories/showchild',[CategoryController::class,'showchild']);
//    Route::delete('/categories/delete/{category}',[CategoryController::class,'destroy']);
});








Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/users/logout', [\App\Http\Controllers\Api\V1\LoginController::class, 'destroy']);
});

