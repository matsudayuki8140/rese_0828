<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;

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
Route::post('/favorite', [FavoriteController::class, 'favorite']);
Route::post('/reservation', [ReservationController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/mypage', [AuthenticatedSessionController::class, 'mypage']);
    Route::get('/rating', function () {
        return view('rating');
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
