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
        DB::unprepared($this->readSQL('countries.sql'));

        DB::unprepared($this->readSQL('states.sql'));

        DB::unprepared($this->readSQL('cities.sql'));
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

    /**
     * Read sql file from disk
     * @param $fileName
     * @param string $filePath
     * @return string
     */
    private function readSQL($fileName, $filePath = '/data/mysql/')
    {
        return file_get_contents(realpath(__DIR__.$filePath.$fileName));
    }

}