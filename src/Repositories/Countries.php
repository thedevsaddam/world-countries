<?php

namespace Thedevsaddam\WorldCountries\Repositories;


use Thedevsaddam\WorldCountries\Models\Country;

class Countries
{
    /**
     * Fetch all countries with states and cities
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCountries()
    {
        return Country::with(['states' => function ($q) {
            $q->with('cities');
        }])->get();
    }

}