<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Public\ContactController;

Route::prefix('v1')->group(function () {
    Route::post('public/contact', ContactController::class)
        ->middleware(['throttle:10,1']);
});
