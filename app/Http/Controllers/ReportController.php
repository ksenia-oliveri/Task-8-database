<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\StartTime;
use App\Models\EndTime;

class ReportController extends Controller
{
    const DIR_1 = '/home/ksjusha/Documents/task-8';
    public function index()
    {   
        //$report = [];
        foreach(file(self::DIR_1 . '/Data/abbreviations.txt') as $line)
        {
            $names = explode('_', $line);
            Driver::create([
                'short-name' => $names[0],
                'name' => $names[1],
                'car' => $names[2],
            ]);
        }
        foreach(file(self::DIR_1 . '/Data/start.log') as $start)
        {   
            $startTime = explode('_', $start);
            $shortNameStart = mb_substr($startTime[0], 0, 3);
            $dateStart = mb_substr($startTime[0], 3);
            //dd($startTime[1]); вот в браузере нормально выводит "12:02:58.917\n" app/Http/Controllers/ReportController.php:29
            StartTime::create([
                'short-name' => $shortNameStart,
                'date' => $dateStart,
                'start-time' => $startTime[1],
            ]);
        }
        
        foreach(file(self::DIR_1 . '/Data/end.log') as $end)
        {   
            $endTime = explode('_', $end);
            $shortNameEnd = mb_substr($endTime[0], 0, 3);
            $dateEnd = mb_substr($endTime[0], 3);
            
            EndTime::create([
                'short-name' => $shortNameEnd,
                'date' => $dateEnd,
                'end-time' => $endTime[1],
            ]);
        }
        
    }
}
