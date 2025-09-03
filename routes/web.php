<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return redirect()->route('companies.index');
});

Route::resource('companies', CompanyController::class);
Route::resource('users', UserController::class);
Route::resource('agents', AgentController::class);
Route::resource('tickets', TicketController::class);
