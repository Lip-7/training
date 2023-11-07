<?php

use App\Http\Controllers\Api\Geolocalization;
use App\Http\Controllers\Api\ApiApartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/registerVisit', [VisitController::class, 'store']);


Route::get("/apartments", [ApiApartmentController::class, "index"]);
Route::get("/search", [ApiApartmentController::class, "search"]);
Route::get("/premium", [ApiApartmentController::class, "premium"]);
Route::get('/geoSearch', [Geolocalization::class, 'search']);
