<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
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

Route::get('/login', 'App\Http\Controllers\LoginController@store');
Route::get('/get-me', 'App\Http\Controllers\users\user@get_me');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<<<<<<< HEAD
Route::post('/users/store',[\App\Http\Controllers\UserController::class,'store']);
Route::post('/users/update/{user}',[\App\Http\Controllers\UserController::class,'update']);
Route::get('/users/show',[\App\Http\Controllers\UserController::class,'show']);
Route::post('/users/login',[\App\Http\Controllers\LoginController::class,'login']);




Route::post('/categories/store',[CategoryController::class,'store']);
Route::post('/categories/update/{category}',[CategoryController::class,'update']);
Route::get('/categories/show',[CategoryController::class,'show']);
Route::get('/categories/showchild',[CategoryController::class,'showchild']);
Route::delete('/categories/delete/{category}',[CategoryController::class,'destroy']);


Route::middleware('auth:sanctum')->group(function (){

    Route::delete('/users/logout',[\App\Http\Controllers\LoginController::class,'destroy']);


});
=======
Route::get('/test', 'App\Http\Controllers\test\test@index');
>>>>>>> b34b8033f47f6e9764005c90d718e4e327b9afe5
