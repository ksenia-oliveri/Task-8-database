<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\Time;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportConsoleTest extends TestCase
{
    /**
     * Test a console command
     */

    use RefreshDatabase;
    public function test_console_command(): void
    {
        Driver::create([
            'shortName' => 'LHM',
            'name' => 'Lewis Hamilton',
            'car' => 'MERCEDES',
        ]);
        Time::create([
            'shortName' => 'LHM',
            'date' => '2018-05-24',
            'startTime' => '12:18:20.125',
            'endTime' => '13:11:32.585',
        ]);
        $this->artisan('app:parse-data', ['file_1' => 'abbreviations.txt', 'file_2' => 'start.log', 'file_3' => 'end.log'])
        ->assertExitCode(0)
        ->assertSuccessful()
        ->expectsOutputToContain('Database successfully created');
    }
}
