<?php

namespace App\Providers;

use App\Models\Feature;
use App\Models\Hotel;
use App\Models\Tag;
use App\Models\Type;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $types = Type::all();
        $locations = Hotel::locations()->get();
        $tags = Tag::all();
        $features = Feature::all();

        View::composer('components.layout.listing.search', function ($view) use ($types, $tags, $features, $locations) {
            $view->with('types', $types)
                ->with('tags', $tags)
                ->with('features', $features)
                ->with('locations', $locations);
        });

        View::composer('components.layout.header', function ($view) use ($types) {
            $view->with('types', $types);
        });
    }
}
