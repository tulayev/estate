<?php

namespace App\Providers;

use App\Helpers\Constants;
use App\Models\Feature;
use App\Models\Hotel;
use App\Models\Location;
use App\Models\Tag;
use App\Models\Type;
use App\Models\TopicCategory;
use App\Services\CurrencyConversionService;
use App\Services\FileUploadService;
use App\Services\ICurrencyConversionService;
use App\Services\IFileUploadService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (!$this->app->environment('production')) {
            $this->app->register('App\Providers\FakerServiceProvider');
        }

        $this->app->singleton(ICurrencyConversionService::class, CurrencyConversionService::class);
        $this->app->singleton(IFileUploadService::class, FileUploadService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Check if tables exist before making database queries
        try {
            if (!\Schema::hasTable('types') || 
                !\Schema::hasTable('tags') || !\Schema::hasTable('features') || 
                !\Schema::hasTable('topic_categories') || !\Schema::hasTable('locations')) {
                return;
            }
        } catch (\Exception $e) {
            // Database connection failed, skip view composers
            return;
        }

        $types = Type::all();
        $tags = Tag::all();
        $features = Feature::all();
        $maxPrice = Hotel::getMaxPrice();
        $topicCategories = TopicCategory::all();
        $rent = $types->find(Constants::SYSTEM_TYPE_IDS['rent']);
        $primary = $types->find(Constants::SYSTEM_TYPE_IDS['primary']);
        $resales = $types->find(Constants::SYSTEM_TYPE_IDS['resales']);
        $land = $tags->find(Constants::SYSTEM_TAG_IDS['land']);
        $locations = Location::all();

        View::composer([
                'components.layout.listing.search',
                'components.layout.insight.search',
                'components.layout.header',
                'components.pages.home.problem',
            ],
            function ($view) use ($types, $tags, $features, $locations, $maxPrice, $primary, $resales, $land, $rent, $topicCategories) {
                $view->with('types', $types)
                    ->with('tags', $tags)
                    ->with('features', $features)
                    ->with('locations', $locations)
                    ->with('maxPrice', $maxPrice)
                    ->with('rent', $rent)
                    ->with('primary', $primary)
                    ->with('resales', $resales)
                    ->with('land', $land)
                    ->with('topicCategories', $topicCategories);
        });

        View::composer('components.layout.header', function ($view) use ($types) {
            $view->with('types', $types);
        });
    }
}
