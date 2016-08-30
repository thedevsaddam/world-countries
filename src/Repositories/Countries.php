<?php

namespace Thedevsaddam\WorldCountries\Repositories;


use Thedevsaddam\WorldCountries\Models\Country;

class Countries
{
    public function getCountries()
    {
        return Country::with(['states' => function ($q) {
            $q->with('cities');
        }])->get();
    }

}