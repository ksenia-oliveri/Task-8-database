<?php

namespace App\Services;

use App\Models\Driver;
use App\Models\Time;
use DateTime;

class ReportService
{
    public function GetData()
    {
        $report = [];
        $drivers = Driver::all();
        $times = Time::all();
        foreach($drivers as $driver)
        {
            foreach($times as $time)
            {
                if($driver->shortName == $time->shortName)
                {   
                    $startTime = DateTime::createFromFormat('H:i:s.u', $time->startTime);
                    $endTime = DateTime::createFromFormat('H:i:s.u', $time->endTime);

                    $timeDiff = $endTime->diff($startTime)->format('%H:%i:%s.%f');
                }
            }

            $report[] = ['shortName' => $driver->shortName, 
            'name' => $driver->name,
            'car' => $driver->car,
            'time'=> $timeDiff];
        }
        usort($report, function($a, $b)
        {
         return $a['time'] > $b['time'];
        });  
        
        return $report;
    }
}
