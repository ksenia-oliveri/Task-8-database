<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\StartTime;
use App\Models\EndTime;
use App\Models\Time;
use DateTime;

class ReportController extends Controller
{
    const DIR_1 = '/home/ksjusha/Documents/task-8';
    public function create()
    {   
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
            $startLine = explode('_', trim($start));

            foreach(file(self::DIR_1 . '/Data/end.log') as $end)
            {
                $endLine = explode('_', trim($end));
                $endTime = $endLine[1];
                if($startLine[0] == $endLine[0])
                {
                    Time::create([
                        'short-name' => mb_substr($endLine[0], 0, 3),
                        'date' => mb_substr($endLine[0], 3),
                        'start-time' => $startLine[1],
                        'end-time' => $endTime]);
                }

            }
            
        }
        
        dd('done');
    }
}
