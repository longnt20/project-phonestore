<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use VanOns\Laraberg\Laraberg;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Laraberg::registerBlockType(
            'my-namespace/my-block',
            [],
            function ($attributes, $content) {
              return view('blocks.my-block', compact('attributes', 'content'));
            }
          );
    }
}
