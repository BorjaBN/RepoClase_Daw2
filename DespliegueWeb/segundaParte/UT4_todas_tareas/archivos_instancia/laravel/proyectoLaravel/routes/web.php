<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return "Hola mundo, de parte de Borja, estamos en Laravel";
});


Route::get('/hola-controller', [HolaController::class, 'index']);
Route::get('/hola-controller/{nombre}', [HolaController::class, 'saludar']);
