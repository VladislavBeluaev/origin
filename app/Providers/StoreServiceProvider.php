<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Store;
class StoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Store::class,App\StoreDocuments::class);
    }
}
