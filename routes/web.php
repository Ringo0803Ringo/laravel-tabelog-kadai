<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::resource('user', UserController::class);
Route::resource('admin', AdminController::class);
Route::resource('booking', BookingController::class);
Route::resource('category', CategoryController::class);
Route::resource('favorite', FavoriteController::class);
Route::resource('review', ReviewController::class);
Route::resource('store', StoreController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
