<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// 商品一覧
Route::get('/', [ProductController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// カート
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index']);
Route::post('/cart/add', [\App\Http\Controllers\CartController::class, 'add']);
Route::post('/cart/update', [\App\Http\Controllers\CartController::class, 'update']);
Route::post('/cart/delete', [\App\Http\Controllers\CartController::class, 'delete']);

// 購入画面
Route::get('/order/confirm', [\App\Http\Controllers\OrderController::class, 'confirm']);
Route::post('/order/complete', [\App\Http\Controllers\OrderController::class, 'complete']);


// 管理画面_商品登録
Route::get('/admin/products', [AdminProductController::class, 'index']);
Route::get('/admin/products/create', [AdminProductController::class, 'create']);
Route::post('/admin/products', [AdminProductController::class, 'store']);
Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit']);
Route::post('/admin/products/{id}', [AdminProductController::class, 'update']);
Route::post('/admin/products/{id}/delete', [AdminProductController::class, 'delete']);

// 管理画面_注文一覧
Route::get('/admin/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index']);