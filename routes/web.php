<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('reports');
});
Route::get('/registration', function () {
    return view('registration');
});
