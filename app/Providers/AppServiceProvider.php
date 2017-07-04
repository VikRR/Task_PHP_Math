<?php

namespace App\Providers;

use App\Model\City;
use App\Model\Country;
use App\Model\Language;
use App\Observers\CityObserver;
use App\Observers\CountryObserver;
use App\Observers\LanguageObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Country::observe(CountryObserver::class);
        City::observe(CityObserver::class);
        Language::observe(LanguageObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
