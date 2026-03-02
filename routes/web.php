<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration', function () {
    return view('registration');
});
Route::get('/reports', [ReportController::class, 'index'])->name('report.index');

Route::get('/reports/create', function() {
    return view('report.create');
})->name('reports.create');

Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('report.destroy');

Route::post('/reports', [ReportController::class, 'store'])->name('report.store');

Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');

Route::put('/reports/{report}', [ReportController::class, 'update'])
            ->name('report.update');