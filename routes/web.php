<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TopController;

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

Route::get('/', [TopController::class, 'get_top'])->name('top');

Auth::routes();

Route::resource('user', UserController::class)->only(['show', 'edit','update', 'delete']);
Route::resource('admin', AdminController::class);
Route::resource('booking', BookingController::class)->only(['index','show','create','store','delete']);
Route::resource('category', CategoryController::class)->only(['index','show']);
Route::resource('favorite', FavoriteController::class)->only(['index','show']);
Route::resource('review', ReviewController::class);
Route::resource('store', StoreController::class)->only(['index','show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
