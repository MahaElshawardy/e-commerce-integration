<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| site Routes
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
// Route::get('/admin', 'AdminDashboardController@index');


// Auth::routes();

Route::get('/', [App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/', [App\Http\Controllers\Dashboard\ProductController::class, 'index'])->name('product');
    Route::get('/create', [App\Http\Controllers\Dashboard\ProductController::class, 'create'])->name('create');
    Route::post('/update/{id}', [App\Http\Controllers\Dashboard\ProductController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [App\Http\Controllers\Dashboard\ProductController::class, 'destroy'])->name('destroy');
});
Auth::routes();
