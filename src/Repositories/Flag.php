<?php

namespace Thedevsaddam\WorldCountries\Repositories;
/**
 * Created by PhpStorm.
 * User: thedevsaddam
 * Date: 8/29/16
 * Time: 6:54 PM
 */
class Flag
{

    private $data = [];
    private $flatPath = 'flags';

    public function __construct()
    {
        $this->readFlagFromJson();
        $this->flatPath = config('flag.flag_path', 'flags');

    }

    /**
     * Read countries.json file from disk
     * @throws \Exception
     */
    private function readFlagFromJson()
    {
        try {
            $this->data = file_get_contents(__DIR__ . '/data/json/countries.json');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Fetch countries with flag
     * @return \Illuminate\Support\Collection
     */
    public function getCountries()
    {
        $countries = json_decode($this->data, true);
        $countries = array_map(function ($country) {
            return [
                'id' => $country['id'],
                'code' => $country['code3l'],
                'name' => $country['name'],
                'officialName' => $country['name_official'],
                'flagSmall' => $country['flag_32'],
                'flagLarge' => $country['flag_128'],
                'flagSmallUrl' => url('') . '/' . $this->flatPath . '/' . $country['flag_32'],
                'flagLargeUrl' => url('') . '/' . $this->flatPath . '/' . $country['flag_128'],
                'latitude' => $country['latitude'],
                'longitude' => $country['longitude'],
                'zoom' => 6,
            ];
        }, $countries);
        return collect($countries);
    }

}