<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return redirect()->route('pages.home.index');
});

Route::get('/', [HomeController::class, 'index'])->name('pages.home.index');

Route::prefix('listings')->group(function () {
   Route::get('/', [ListingController::class, 'index'])->name('pages.listing.index');
   Route::get('/{slug}', [ListingController::class, 'show'])->name('pages.listing.show');
});

Route::get('/club', [ClubController::class, 'index'])->name('pages.club.index');

Route::prefix('insights')->group(function() {
    Route::get('/', [InsightController::class, 'index'])->name('pages.insight.index');
    Route::get('/{slug}', [InsightController::class, 'show'])->name('pages.insight.show');
    Route::post('/{topicId}/like', [InsightController::class, 'likeTopic']);
    Route::get('/{topicId}/likes', [InsightController::class, 'getLikes']);
});

Route::get('/about-us', [AboutController::class, 'index'])->name('pages.about.index');
