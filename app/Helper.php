<?php

/*
    this file in order to laravel look to it there two solution
    * the first add include in register() in serviceProvider
    * the second solution : and this best abd professional add files key in autoload and add the path of this file
*/

// here not committed to put namespace because direct in app folder

use App\Facades\Currency;
use Illuminate\Support\Facades\App;

function currency($value)
{
    return Currency::formatCurrency($value, config('app.currency'));

    // they're other ways to called thr formatCurrency() function
    // App::make('currency')->formatCurrency($value, config('app.currency'));
    // app('currency')->formatCurrency($value, config('app.currency'));;
}
