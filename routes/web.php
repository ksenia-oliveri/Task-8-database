<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/report/create', [ReportController::class, 'create']);

Route::get('/report/show', [ReportController::class, 'read']);
