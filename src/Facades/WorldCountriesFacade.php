<?php

namespace Thedevsaddam\WorldCountries\Facades;

use Illuminate\Support\Facades\Facade;

class WorldCountriesFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'world-countries';
    }

}