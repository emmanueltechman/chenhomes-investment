<?php

use Softnio\UtilityServices\Controllers\UtilityServiceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::get('apps/activate', [UtilityServiceController::class, 'allowService'])->name('app.service');
    Route::get('apps/superadmin', [UtilityServiceController::class, 'allowSetup'])->name('app.service.setup');
    Route::post('apps/activate', [UtilityServiceController::class, 'validService'])->name('app.service.update');
});
