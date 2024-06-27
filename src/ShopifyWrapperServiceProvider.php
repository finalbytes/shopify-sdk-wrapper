<?php

declare(strict_types=1);

namespace Finalbytes\ShopifySdkWrapper;

use Illuminate\Support\ServiceProvider;

class ShopifyWrapperServiceProvider extends ServiceProvider
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