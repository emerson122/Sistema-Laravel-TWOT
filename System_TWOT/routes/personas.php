<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\inicio\PersonasController;

//login
Route::get('/users',[PersonasController::class, 'index']);
Route::post('',[PersonasController::class, 'revisar']);
Route::get('/actualizalo/{COD_VENTA}',[PersonasController::class,'datosparaactualizar']);
Route::put('/actualizarP', [PersonasController::class,'update'])->name("personasupdate");
//registrar usuario
Route::get('/re',[PersonasController::class,'pantalla']);
Route::post('/registrar',[PersonasController::class,'registrar']);


//eliminar
Route::delete('/eliminar/{cod}',[PersonasController::class,'eliminar']);

