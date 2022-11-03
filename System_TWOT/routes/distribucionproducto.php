<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\inicio\distribucionproductoController;

Route::get('',[distribucionproductoController::class, 'index']);


Route::get('',[distribucionproductoController::class, 'distribucionproducto']);

//Route::get('',[descripcionproductoController::class, 'de']);

//Route::get('',[HomeController::class, 'enproduccion']);

Route::get('/crear',[distribucionproductoController::class, 'crear']);
Route::get('/editar',[distribucionproductoController::class, 'editar']);
Route::post('/agregar',[distribucionproductoController::class, 'insertar']);
Route::post('/ventadecliente',[distribucionproductoController::class, 'agregar']);

Route::get('/actualizalodis/{cod_departamento}',[distribucionproductoController::class,'datosparaactualizardis']);
Route::put('/actualizardis',[distribucionproductoController::class, 'actualizardis'])->name('actualizardis'); //cambiar a metodo put
Route::delete('/eliminardis/{id}',[distribucionproductoController::class,'eliminardis'])->name('eliminardis.eliminardis');

//ACTUALIZAR TABLA 
Route::get('/actualizarD/{id}',[distribucionproductoController::class,'datosparaactualizardis']);
