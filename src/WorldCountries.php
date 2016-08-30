<?php

namespace Thedevsaddam\WorldCountries;


use Thedevsaddam\WorldCountries\Models\Country;
use Thedevsaddam\WorldCountries\Models\State;
use Thedevsaddam\WorldCountries\Models\City;
use Thedevsaddam\WorldCountries\Repositories\Countries;
use Thedevsaddam\WorldCountries\Repositories\Flag;

class WorldCountries
{
    private $flag;
    private $countries;
    private $states;
    private $cities;

    public function __construct()
    {
        $this->flag = new Flag();
        $this->countries = new Country();
        $this->states = new State();
        $this->cities = new City();
    }

    public function getCountriesWithFlag()
    {
        return $this->flag->getCountries();
    }

    public function getCountriesWithStateCity()
    {
        $countries = (new Countries())->getCountries();
        if (app()::VERSION < 5.3) {
            return collect($countries);
        } else {
            return $countries;
        }
    }

    public function getCountryModel()
    {
        return $this->countries;
    }

    public function getStateModel()
    {
        return $this->states;
    }

    public function getCityModel()
    {
        return $this->cities;
    }

}