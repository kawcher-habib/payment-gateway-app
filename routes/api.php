<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::post('/place-order', [OrderController::class, 'placeOrder']);
Route::post('/payment-callback', [OrderController::class, 'paymentCallback']);