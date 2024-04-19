<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/report/create', [ReportController::class, 'create']);

Route::get('/report/show', [ReportController::class, 'getReport']);

Route::get('/report/show/drivers', [ReportController::class, 'getDriversList']);

Route::get('/report/show/drivers/info', [ReportController::class, 'getDriverInfo'])->name('report.drivers.info');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
