<?php

use App\Http\Controllers\API\{
    LocationController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 *
 * Auth & Admin routes
 *
 * Route Prefix: /api/admin/
 */
Route::group([
    // 'middleware' => 'auth',
    'prefix' => '/admin/',
], function () {

    Route::post('/location-status/{location}', [LocationController::class, 'updateLocationStatus']);

});