<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware('token')->group(function () {

    Route::post('/payment-callback', [OrderController::class, 'paymentCallback']);
    });
    Route::post('/place-order', [OrderController::class, 'placeOrder']);
