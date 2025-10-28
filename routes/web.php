<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;

Route::get('/', function () {
    return view('welcome');
});
