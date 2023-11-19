<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Site\ProductController::class, 'index'])->name('index');
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/', [App\Http\Controllers\Site\ProductController::class, 'index'])->name('index');
    Route::get('/show/{id}', [App\Http\Controllers\Site\ProductController::class, 'show'])->name('show');
    // Route::get('/show/{id}?{color_id}', [App\Http\Controllers\Site\ProductController::class, 'get_color'])->name('show');
});
Route::group(['prefix' => 'pickup', 'as' => 'pickup.'], function () {
    Route::get('/', [App\Http\Controllers\Site\PickUpController::class, 'index'])->name('index');
    Route::post('/store', [App\Http\Controllers\Site\PickUpController::class, 'store'])->name('store');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
