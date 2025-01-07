<?php

namespace App\Providers;

use App\Models\Feature;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.layout.search', function ($view) {
            $view
                ->with('tags', Tag::all())
                ->with('features', Feature::all());
        });
    }
}
