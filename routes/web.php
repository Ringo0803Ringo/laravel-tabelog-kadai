<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompanyController;


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
Route::get('/search', [TopController::class, 'search']);
Route::get('/company', [CompanyController::class, 'company'])->name('company');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {
    // ここにログイン済み＆verify済みのユーザーのみアクセスできるルートを追加
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/review/{review}', [ReviewController::class, 'show'])->name('review.show');
    Route::post('/review/{store}', [ReviewController::class, 'store'])->name('review.store');
    Route::delete('/review/{review}/destroy', [ReviewController::class, 'destroy'])->name('review.destroy');
    
    Route::post('/favorite/{store}', [FavoriteController::class, 'store'])->name('favorite.store');
    Route::delete('/favorite/{favorite}/destroy', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
    
    Route::get('/booking/{store}/create', [BookingController::class, 'create'])->name('store.booking');
    Route::post('/booking/{store}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{booking}', [BookingController::class, 'show'])->name('booking.show');
    Route::delete('/booking/{booking}/destroy', [BookingController::class, 'destroy'])->name('booking.destroy');

    Route::get('/store/{store}', [StoreController::class, 'show'])->name('store.show');

    Route::controller(CheckoutController::class)->group(function () {
        Route::get('/checkout', 'index')->name('checkout.index');
        Route::post('/checkout', 'store')->name('checkout.store');
        Route::get('/edit_card', 'edit')->name('edit_card');
        Route::post('/update_card', 'update')->name('card.update');
        Route::post('/subscription/cancel', 'cancel_subscription')->name('subscription.cancel');
    });

});
