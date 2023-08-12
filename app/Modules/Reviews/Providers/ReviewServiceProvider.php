<?php

namespace App\Modules\Reviews\Providers;

use Illuminate\Support\ServiceProvider;

class ReviewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // here I determine the path for migrations files until make for it migrate.
        // and I said for laravel where take the migrations files
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // reviews it's represent the namespace of view files
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'reviews');

        // it's example if was found this folder. (lang)
        $this->loadJsonTranslationsFrom(__DIR__ . '/../lang');

        // for make dispatch for configuration files
        // $this->mergeConfigFrom(__DIR__ . '/../config/reviews.php', 'reviews');

        // the meaning this code will publish and add the config file name if reviews.php
        // $this->publishes([
        //     __DIR__ . '/../config/reviews.php' => config_path('reviews.php')
        //     // here config it's represent the config category mean the config folder.
        // ], 'config');

        // any the view files from out package must put them in vendor folder then inside it name of package
        // $this->publishes([
        //     __DIR__ . '/../resources/views' => config_path('views/vendor/reviews')
        // ], 'views');
    }
}
