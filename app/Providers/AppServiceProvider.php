<?php

namespace App\Providers;

use App\Services\CdnService;
use App\Services\DoCdnService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind(CdnService::class, DoCdnService::class);
    }
}
