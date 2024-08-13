<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers;
use App\Models\Driver;
use App\Models\Time;
use App\Http\Controllers\ReportController;

class ParseDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-data {file_1} {file_2} {file_3}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parses and saves data from files to a database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if($this->argument('file_1') == 'abbreviations.txt' && $this->argument('file_2') == 'start.log' && $this->argument('file_3') == 'end.log')
        {
            $obj = new ReportController();
            $obj->create();
            
            $this->info('Database successfully created');
        }
            
    }
}
