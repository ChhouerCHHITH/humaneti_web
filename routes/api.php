<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Public\ContactController;
use App\Http\Controllers\Api\V1\Public\SubscriptionPlanController;
use App\Http\Controllers\Api\V1\Public\SubscriptionRequestController;

Route::prefix('v1')->group(function () {
    Route::post('public/contact', ContactController::class)
        ->middleware(['throttle:10,1']);

    Route::get('public/subscription-plans', SubscriptionPlanController::class)
        ->middleware(['throttle:30,1']);

    Route::post('public/subscription-requests', SubscriptionRequestController::class)
        ->middleware(['throttle:20,1']);
});
