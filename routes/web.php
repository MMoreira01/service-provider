<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', [AuthController::class, 'redirect']);
Route::get('/callback', [AuthController::class, 'callback']);
