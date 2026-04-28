<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 商品一覧（トップ）
Route::get('/', [ProductController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// 管理画面（admin制御）
Route::middleware('admin')->group(function () {
    Route::get('/admin/products', [AdminProductController::class, 'index']);
    Route::get('/admin/products/create', [AdminProductController::class, 'create']);
    Route::post('/admin/products', [AdminProductController::class, 'store']);
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit']);
    Route::post('/admin/products/{id}', [AdminProductController::class, 'update']);
    Route::post('/admin/products/{id}/delete', [AdminProductController::class, 'delete']);

    Route::get('/admin/orders', [AdminOrderController::class, 'index']);
});

// 認証必須
Route::middleware('auth')->group(function () {

    // カート
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::post('/cart/update', [CartController::class, 'update']);
    Route::post('/cart/delete', [CartController::class, 'delete']);

    // 注文
    Route::get('/order/confirm', [OrderController::class, 'confirm']);
    Route::post('/order/complete', [OrderController::class, 'complete']);
});

// Breezeデフォルト
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// プロフィール
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';