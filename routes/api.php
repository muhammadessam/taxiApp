<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

/*
 * These routes are prefixed with 'api' by default.
 * These routes use the root namespace 'App\Http\Controllers\Api'.
 */
Route::namespace('Api')->group(function () {

    /**
     * These routes are prefixed with 'api/v1'.
     * These routes use the root namespace 'App\Http\Controllers\Api\V1'.
     */
    Route::prefix('v1')->namespace('V1')->group(function () {
        include_route_files('api/v1');
    });

    /*
     * New requested modifications for version 1
     */
    Route::middleware('auth:api')->group(function () {
        Route::get('plans', [\App\Http\Controllers\Api\V1\Plans\PlanController::class, 'index']);
        Route::get('get-radius-drivers', [\App\Http\Controllers\Api\V1\Driver\PlanDriverController::class, 'getDriverWithinSomeRadius']);
        Route::post('set-driver-locs', [\App\Http\Controllers\Api\V1\Driver\PlanDriverController::class, 'setDriverLocations']);
        Route::post('set-driver-times', [\App\Http\Controllers\Api\V1\Driver\PlanDriverController::class, 'setDriverAvailability']);

        Route::post('subscribe', [\App\Http\Controllers\Api\V1\Subscription\SubscriptionController::class, 'subscribe']);
    });
});
