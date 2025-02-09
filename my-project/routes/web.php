<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;


Route::get('/', [inicioController::class, 'inicio']);
Route::get('/inicio', [inicioController::class, 'inicio']);
Route::get('/inicio/admin', [inicioController::class, 'admin']);
Route::get('/inicio/chollo/{id}', [inicioController::class, 'chollo']);
Route::get('/inicio/formchollo', [inicioController::class, 'formchollo']);
Route::post('/inicio', [inicioController::class, 'newchollo']);
