<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('category', CategoryController::class);
Route::get('category', [CategoryController::class,'index']);
Route::post('posts', [CategoryController::class,'store']);
Route::get('posts/{post}', [CategoryController::class,'show']);
Route::put('posts/{post}', [CategoryController::class,'update']);
Route::delete('posts/{post}', [CategoryController::class,'destroy']);
//Route::resource('post', 'CategoryController@store');
//Route::apiResource('category', 'CategoryController');
