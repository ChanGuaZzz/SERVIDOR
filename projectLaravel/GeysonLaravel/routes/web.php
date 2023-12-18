<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\endpoint;


Route::get('/', function () { return view('welcome');});

Route::get('/ruta-get', [endpoint::class, 'Metodoget']);


