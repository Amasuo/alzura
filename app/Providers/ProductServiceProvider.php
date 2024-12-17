<?php

namespace App\Providers;

use App\Services\Product\ProductFetcher;
use App\Services\Product\ProductService;
use App\Services\Product\Sources\CSVProductSource;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductFetcher::class, function ($app) {
            return new ProductFetcher(
                // as there are no database or xml file we keep them commented
                //new DatabaseProductSource(),
                //new XMLProductSource('path/xml/file.xml'),
                new CSVProductSource(config('datasources.csv.path')),
            );
        });

        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService($app->make(ProductFetcher::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
