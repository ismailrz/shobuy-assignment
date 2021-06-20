<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/add-category', 'App\Http\Controllers\ProductController@addCategory');
Route::post('/add-product', 'App\Http\Controllers\ProductController@addProduct');
Route::get('/get-categories', 'App\Http\Controllers\ProductController@getCategories');
Route::get('/get-products', 'App\Http\Controllers\ProductController@getProducts');