<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Time;
use App\Services\ReportService;


class ReportController extends Controller
{
    const DIR_1 = '/home/ksjusha/Documents/task-8';
    public function create()
    {   
        foreach(file(self::DIR_1 . '/Data/abbreviations.txt') as $line)
        {
            $names = explode('_', $line);
            Driver::create([
                'shortName' => $names[0],
                'name' => $names[1],
                'car' => $names[2],
            ]);
        }

        foreach(file(self::DIR_1 . '/Data/start.log') as $start)
        {   
            $startLine = explode('_', trim($start));

            foreach(file(self::DIR_1 . '/Data/end.log') as $end)
            {
                $endLine = explode('_', trim($end));
                $endTime = $endLine[1];
                if($startLine[0] == $endLine[0])
                {
                    Time::create([
                        'shortName' => mb_substr($endLine[0], 0, 3),
                        'date' => mb_substr($endLine[0], 3),
                        'startTime' => $startLine[1],
                        'endTime' => $endTime]);
                }
            }    
        }    
        //dd('done');
    }

    public function getReport()
    {   
        $obj = new ReportService();
        $report = $obj->GetData();
        return view('report', ['report' => $report]);    
    }

    public function getDriversList()
    {
        $obj = new ReportService();
        $drivers = $obj->GetData();
        return view('drivers', ['drivers' => $drivers]);
    }

    public function getDriverInfo()
    {
        $obj = new ReportService();
        $driverInfo = $obj->GetData();
        return view('driversInfo', ['driverInfo' => $driverInfo, 'driver_id' => request('driver_id')]);
    }
}
