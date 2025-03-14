<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomrentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalcController;
use App\Http\Controllers\SettingController;
use App\Models\Roomrent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $roomrents = Roomrent::all();
    return view('roomrent/index', compact('roomrents'));
    // return view('welcome');
});

Route::get('/roomrent', [RoomrentController::class, 'index']);
Route::post('/roomrent/search', [RoomrentController::class, 'search']);
Route::get('/roomrent/calc/{id?}',[RoomrentController::class,'calc']);
Route::post('/roomrent/updatecalc', [RoomrentController::class, 'updatecalc']);
Route::get('/roomrent/edit/{id?}',[RoomrentController::class,'edit']);
Route::post('/roomrent/update', [RoomrentController::class, 'update']);
Route::post('/roomrent/add', [RoomrentController::class, 'insert']);
Route::get('/roomrent/remove/{id}',[RoomrentController::class,'remove']);
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/roomrent/conclude/{id?}',[RoomrentController::class,'conclude']);
Route::post('/roomrent/updateconclude',[RoomrentController::class,'updateconclude']);
Route::get('/roomrent/complete/{id?}',[RoomrentController::class,'complete']);

Route::get('/setting', [SettingController::class,'index']);
Route::get('/setting/edit/{id?}',[SettingController::class,'edit']);
Route::post('/setting/update', [SettingController::class, 'update']);