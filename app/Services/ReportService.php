<?php
namespace App\Services;

use App\Models\Driver;
use App\Models\StartTime;
use App\Models\EndTime;

class ReportService
{   
    const DIR_1 = '/home/ksjusha/Documents/Task-8';
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
            $startTime = explode('_', $start);
            $shortNameStart = mb_substr($startTime[0], 0, 3);
            $dateStart = mb_substr($startTime[0], 4);
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
            $dateEnd = mb_substr($endTime[0], 4);
            EndTime::create([
                'short-name' => $shortNameEnd,
                'date' => $dateEnd,
                'end-time' => $endTime[1],
            ]);

        }
    }
}