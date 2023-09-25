<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RepresentativeController;

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

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);
Route::get('/search', [ShopController::class, 'search']);

Route::middleware('auth', 'verified')->group(function () {
    Route::post('/favorite', [FavoriteController::class, 'favorite']);
    Route::post('/reservation', [ReservationController::class, 'store']);
    Route::patch('/reservation/update', [ReservationController::class, 'update']);
    Route::delete('/reservation/delete', [ReservationController::class, 'destroy']);
    Route::get('/mypage', [AuthenticatedSessionController::class, 'mypage']);
    Route::get('/rating/{shop_id}', [RatingController::class, 'create']);
    Route::post('/rating', [RatingController::class, 'store']);
});

Route::middleware('auth', 'verified', 'can:admin')->group(function () {
    Route::prefix('admin')->group(function() {
        Route::get('', [AdminController::class, 'index']);
        Route::post('/register', [AdminController::class, 'store']);
    });
});

Route::middleware('auth', 'verified', 'can:representative')->group(function () {
    Route::prefix('shop')->group(function() {
        Route::get('index', [RepresentativeController::class, 'index']);
        Route::get('rese', [RepresentativeController::class, 'rese']);
        Route::get('rating', [RepresentativeController::class, 'rating']);
        Route::get('mail', [RepresentativeController::class, 'mail']);
        Route::post('sendMail', [RepresentativeController::class, 'sendMail']);
        Route::get('', [RepresentativeController::class, 'create']);
        Route::post('/store', [RepresentativeController::class, 'store']);
        Route::patch('/update', [RepresentativeController::class, 'update']);
    });
});



require __DIR__.'/auth.php';
