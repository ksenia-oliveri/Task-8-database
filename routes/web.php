<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');

Route::get('/report/show', [ReportController::class, 'getReport'])->name('report.show');

Route::get('/report/show/drivers', [ReportController::class, 'getDriversList'])->name('report.show.drivers');

Route::get('/report/show/drivers/info', [ReportController::class, 'getDriverInfo'])->name('report.drivers.info');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
