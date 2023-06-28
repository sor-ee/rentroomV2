<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoomrentControllerApi;
use App\Http\Controllers\Api\CategoryControllerApi;

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
Route::get('/roomrent',[RoomrentControllerApi::class,'roomrent_list']);
Route::get('/roomrent/{category_id?}',[RoomrentControllerApi::class, 'roomrent_list']);
Route::get('/category',[CategoryControllerApi::class,'category_list']);