<?php

use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\productcontroller;
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

// public Routes

Route::POST('/register', [Authcontroller::class,'register']);
Route::POST('/login', [Authcontroller::class,'login']);

// Privet Routes
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::resource('/products', productcontroller::class);
    Route::get('/products/search/{name}', [productcontroller::class,'search']);
    Route::POST('/logout', [Authcontroller::class,'logout']);
});


