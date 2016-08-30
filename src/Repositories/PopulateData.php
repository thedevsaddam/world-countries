<?php
namespace Thedevsaddam\WorldCountries\Repositories;

use DB;
use Illuminate\Database\Migrations\Migration;

class PopulateData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $countries = realpath(__DIR__ . '/data/mysql/countries.sql');
        DB::unprepared(file_get_contents($countries));

        $states = __DIR__ . '/data/mysql/states.sql';
        DB::unprepared(file_get_contents($states));

        $cities = __DIR__ . '/data/mysql/cities.sql';
        DB::unprepared(file_get_contents($cities));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TABLE countries');
        DB::unprepared('DROP TABLE states');
        DB::unprepared('DROP TABLE cities');
    }
}