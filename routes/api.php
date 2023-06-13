<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
Route::put('posts/{post}/update', [CategoryController::class,'update']);
Route::delete('posts/{post}/destroy', [CategoryController::class,'destroy']);

Route::get('product', [ProductController::class,'index']);
Route::post('product-posts', [ProductController::class,'store']);
Route::get('product-posts/{post}', [ProductController::class,'show']);
Route::put('product-posts/{post}/update', [ProductController::class,'update']);
Route::delete('product-posts/{post}/destroy', [ProductController::class,'destroy']);

