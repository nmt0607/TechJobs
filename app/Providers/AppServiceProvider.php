<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        Validator::extend('password_verify', function ($attribute, $value, $parameters, $validator) {
            return password_verify($value, auth()->user()->password);
        });

        Validator::replacer('password_verify', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute',$attribute, 'Sai mật khẩu');
        });

    }
}
