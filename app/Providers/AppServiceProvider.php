<?php

namespace SocialApp\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('age', function($attribute, $value, $parameters, $validator) {
            $requiredAge = Carbon::now()->subYears($parameters[0]);
            return new Carbon($value) <= $requiredAge;
        });
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
