<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Storefront View
Route::get('/', [ShopController::class, 'index'])->name('boutique.index');

// Storefront APIs
Route::prefix('api')->group(function () {
    Route::get('/products', [ShopController::class, 'getProducts']);
    Route::post('/coupon/apply', [ShopController::class, 'applyCoupon']);
    Route::post('/checkout', [ShopController::class, 'checkout']);
    Route::get('/order/track/{orderNumber}', [ShopController::class, 'trackOrder']);

    // Admin APIs
    Route::prefix('admin')->group(function () {
        Route::get('/stats', [AdminController::class, 'stats']);
        Route::get('/orders', [AdminController::class, 'getOrders']);
        Route::patch('/orders/{id}/status', [AdminController::class, 'updateOrderStatus']);
        Route::post('/products', [AdminController::class, 'storeProduct']);
        Route::put('/products/{id}', [AdminController::class, 'updateProduct']);
        Route::delete('/products/{id}', [AdminController::class, 'deleteProduct']);
    });
});
