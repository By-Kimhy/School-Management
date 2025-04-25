<?php

use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\BDashboardController;
use App\Http\Controllers\backend\BMajorController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


/* frontend block */
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index');
});

Route::controller(AboutController::class)->group(function(){
    Route::get('/about','index');
});

/* backend block */
Route::controller(AuthController::class)->group(function(){
    Route::get('/login','index');
});

Route::controller(BDashboardController::class)->group(function(){
    Route::get('/dashboard','index');
});

Route::resource('/major',BMajorController::class);