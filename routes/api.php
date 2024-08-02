<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Api_controller;
use App\Http\Controllers\API\ApiAuthController;

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


Route::get('dashboard', [Api_controller::class, 'index']);
Route::post('login', [ApiAuthController::class, 'login']);
Route::middleware(['apiLogin'])->group(function () {
Route::post('sites', [ApiAuthController::class, 'sitesList']);
Route::post('logout', [ApiAuthController::class, 'logout']);
Route::post('projects-save', [ApiAuthController::class, 'projects_details_save']);
Route::post('saveConflicts-image', [ApiAuthController::class, 'saveConflicts']);
});
