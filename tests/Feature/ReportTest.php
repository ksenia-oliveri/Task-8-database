<?php

namespace Tests\Feature;

use App\Http\Controllers\Api\v1\ReportApiController;
use App\Models\Driver;
use App\Models\Time;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;
    public function test_createpage_creates_database(): void
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

        $response = $this->get('/report/create');
        $response->assertStatus(200)
        ->assertSee('Database successfully created');
    }

    public function test_showpage_shows_report(): void
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
       
        $response = $this->get('/report/show');
        $response->assertStatus(200)
        ->assertSee('Monaco Racing Report 2018');
        
        $response->assertSee('Lewis Hamilton')
        ->assertSee('MERCEDES');    
    }

    public function test_api_returns_json_report(): void
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
        
       $response = $this->getJson(route('api.report'));

        $response->assertOk()
        ->assertJsonCount(1)
        ->assertJsonStructure([
            0 =>['shortName',
            'name',
            'car',
            'time']
        ])
        ->assertJsonFragment([
            'shortName' => 'LHM',
            'name' => 'Lewis Hamilton',
            'car' => 'MERCEDES'
        ]);
    
    }
}
