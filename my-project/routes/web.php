<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\AdminController;

// Rutas inicio
Route::get('/', [inicioController::class, 'inicio']);
Route::get('/inicio', [inicioController::class, 'inicio']);
Route::get('/inicio/admin', [inicioController::class, 'admin']);
Route::get('/inicio/chollo/{id}', [inicioController::class, 'chollo']);
Route::get('/inicio/formchollo', [inicioController::class, 'formchollo']);
Route::post('/inicio', [inicioController::class, 'newchollo']);

// Rutas Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/delete_user/{id}', [AdminController::class, 'deleteUser']);
Route::get('/admin/delete_chollo/{id}', [AdminController::class, 'deleteChollo']);
