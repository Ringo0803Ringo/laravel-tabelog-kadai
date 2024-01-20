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
/** 
 * Route::HTTPメソッド(パス, [コントローラー名::class, アクション名])->name('ルート名');
 * 
 * 【 HTTPメソッド: GET, POST, PUT, PATCH, DELETE 】
 * ・ GET: データの取得・ページの表示
 * ・　POST: データの登録
 * ・　PUT＆PATCH: データの更新
 * ・　DELETE: データの削除
*/

Route::get('/', [TopController::class, 'get_top'])->name('top');

Auth::routes();

Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{user}', [UserController::class, 'destory'])->name('user.destory');

Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/booking/{booking}', [BookingController::class, 'show'])->name('booking.show');
Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::delete('/booking/{booking}', [BookingController::class, 'delete'])->name('booking.delete');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/favorite/{store}', [FavoriteController::class, 'index'])->name('store.favorite');

Route::get('/review', [ReviewController::class, 'create'])->name('review.create');
Route::delete('/review', [ReviewController::class, 'destory'])->name('review.destory');

Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/{store}', [StoreController::class, 'show'])->name('store.show');
Route::post('/store', [StoreController::class, 'store'])->name('store.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin', AdminController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    // ここにログイン済み＆verify済みのユーザーのみアクセスできるルートを追加
    
});
