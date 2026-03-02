<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('reports');
});
Route::get('/registration', function () {
    return view('registration');
});
Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::get('/reports/create', function() {
    return view('report.create');
})->name('reports.create');

Route::get('/reports/{report}', [ReportController::class, 'destroy'])->name('report.destroy');

Route::post('/reports', [ReportController::class, 'store'])->name('report.store');