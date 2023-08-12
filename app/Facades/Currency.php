<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Currency extends Facade
{

    // here must added this function if I need this class to be facade class

    /**
     *Get string from this function
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        // this same name in service container
        return 'currency';
    }
}
