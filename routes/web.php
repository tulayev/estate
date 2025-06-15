<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\SubscriptionController;
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

Route::get('/change-locale/{locale}', function($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('change-locale');

Route::get('/change-currency/{countryCode}', function($countryCode) {
    session()->put('countryCode', $countryCode);
    return redirect()->back();
})->name('change-currency');

Route::get('/', [HomeController::class, 'index'])->name('pages.home.index');

Route::prefix('listings')->group(function () {
    Route::get('/', [ListingController::class, 'index'])->name('pages.listing.index');
    Route::get('/compare', [ListingController::class, 'compare'])->name('pages.listing.compare');
    Route::get('/map-view', [ListingController::class, 'mapView'])->name('pages.listing.map');
    Route::get('/map-view/{hotelId}', [ListingController::class, 'mapViewShow'])->name('pages.listing.map.show');
    Route::get('/{slug}', [ListingController::class, 'show'])->name('pages.listing.show');
    Route::post('/{hotelId}/like', [ListingController::class, 'like'])->name('hotel.like');
    Route::post('/search/count', [ListingController::class, 'hotelsCount'])->name('hotels.search.count');
});

Route::get('/club', [ClubController::class, 'index'])->name('pages.club.index');

Route::prefix('insights')->group(function() {
    Route::get('/', [InsightController::class, 'index'])->name('pages.insight.index');
    Route::get('/{slug}', [InsightController::class, 'show'])->name('pages.insight.show');
    Route::post('/{topicId}/like', [InsightController::class, 'like'])->name('topic.like');
    Route::get('/search/topics', [InsightController::class, 'searchTopics'])->name('topics.search.titles');
    Route::post('/search/count', [InsightController::class, 'topicsCount'])->name('topics.search.count');
});

Route::prefix('subscriptions')->group(function () {
    Route::post('/subscribe/{hotelId}', [SubscriptionController::class, 'subscribe'])->name('subscribe.hotel');
    Route::post('/verify', [SubscriptionController::class, 'verify'])->name('subscription.verify');
    Route::get('/unsubscribe/{token}', [SubscriptionController::class, 'unsubscribe'])->name('subscription.unsubscribe');
    Route::get('/subscription-status/{hotelId}', [SubscriptionController::class, 'status'])->name('subscription.status');
});

Route::get('/about-us', [AboutController::class, 'index'])->name('pages.about.index');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
