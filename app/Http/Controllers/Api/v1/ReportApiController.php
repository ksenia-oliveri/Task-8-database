<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\ReportService;


class ReportApiController extends Controller
{
    public function index()
    {
        $obj = new ReportService();
        $report = $obj->GetData();
        
        return response()->json($report);
    }
}
