<?php

namespace App\Providers;

use App;
use App\Rules\FilterRule;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
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
        // here Gate will called before method before define
        // if this function return true of false won't call the define method
        /* if this method return true will be with user all authorizations and
         if was false will cancelled all authorizations for user */
        Gate::before(function ($user, $ability) {
            // here I assumed the user the id it qual 1 mean super admin
            // if wasn't id == 1 mean not returned true will execute the code in define method
            if ($user->id == 1) {
                return true;
            }
        });

        foreach (config('abilities') as $ability => $label) {

            /*
            here can not pass the ability in function normally because it's callback from laravel not custom
            mean here we use keyword use with function
            */
            Gate::define($ability, function ($user) use ($ability) {
                return $user->hasAbility($ability);
            });
        }


        // here will change the language by parameter lang in url and the default value it's en
        // App::setLocale(request('lang', 'en'));

        // this code cancel the wrapping mean don't send the data inside object
        JsonResource::withoutWrapping();

        Paginator::useBootstrap();
        //Paginator::defaultView('vendor.pagination.tailwind');
        //Paginator::defaultSimpleView('vendor.pagination.simple-tailwind');

        Validator::extend('filter', function ($attribute, $value) {
            if ($value == 'god') {
                return false;
            }
            return true;
        }, 'Invalid word');
    }
}
