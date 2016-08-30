<?php

namespace Thedevsaddam\WorldCountries\Console\Commands;

use Illuminate\Console\Command;
use Thedevsaddam\WorldCountries\Repositories\PopulateData;


class PopulateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'world-countries:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate Country associated tables';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->populateDatabase();
    }

    /**
     * @return bool
     */
    public function populateDatabase()
    {
        (new PopulateData())->up();
        $this->info('Database populated!');
    }

}