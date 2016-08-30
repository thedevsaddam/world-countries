<?php

namespace Thedevsaddam\WorldCountries\Console\Commands;

use Illuminate\Console\Command;
use Thedevsaddam\WorldCountries\Repositories\PopulateData;


class RemoveDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'world-countries:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop Country associated tables';

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
        $this->removeDatabase();
    }

    /**
     * @return bool
     */
    public function removeDatabase()
    {
        (new PopulateData())->down();
        $this->info('Database dropped!');
    }

}