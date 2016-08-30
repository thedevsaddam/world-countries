<?php

namespace Thedevsaddam\WorldCountries\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states';

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
