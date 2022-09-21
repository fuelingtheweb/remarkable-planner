<?php

use Illuminate\Support\Facades\Route;

Route::get('/tasks', 'App\Http\Controllers\PlannerController@tasks');
Route::get('/{year?}', 'App\Http\Controllers\PlannerController@year');
Route::get('/{year}/{month}/{day}', 'App\Http\Controllers\PlannerController@day');
