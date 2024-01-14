<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\BookingController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\FavoriteController;
use App\Http\Controllers\Auth\ReviewController;
use App\Http\Controllers\Auth\StoreController;

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

Route::resource('user', UserController::class)->only(['index','show','edit','update']);
Route::resource('admin', AdminController::class);
Route::resource('booking', BookingController::class)->only(['index','show']);
Route::resource('category', CategoryController::class)->only(['index','show']);
Route::resource('favorite', FavoriteController::class)->only(['index','show']);
Route::resource('review', ReviewController::class);
Route::resource('store', StoreController::class)->only(['index','show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

