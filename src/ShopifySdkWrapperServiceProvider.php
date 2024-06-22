<?php

declare(strict_types=1);

use Illuminate\Support\ServiceProvider;

class ShopifySdkWrapperServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ShopifyService::class, function ($app) {
           return new ShopifyService(
               config('services.shopify.shop'),
               config('services.shopify.access_token'),
           );
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/..config/shopify.php' => config_path('shopify.php'),
        ]);
    }
}