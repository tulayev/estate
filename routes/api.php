<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/objects/count', [ListingController::class, 'count']);

Route::prefix('search')->group(function () {
   Route::get('/locations', [SearchController::class, 'locations'])->name('search.locations');
});
