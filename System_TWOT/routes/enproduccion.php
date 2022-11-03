<?php

use App\Http\Controllers\enproduccionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Inicio\HomeControllerenproduccion;

Route::get('',[HomeController::class, 'index']);


//Route::get('',[HomeController::class, 'fabricante']);

Route::get('',[HomeControllerenproduccion::class, 'enproduccion']);


////nuevas para post */
Route::get('/crear',[HomeControllerenproduccion::class, 'crear']);
Route::get('/editar',[HomeControllerenproduccion::class, 'editar']);
Route::post('/agregar',[HomeControllerenproduccion::class, 'insertar']);

Route::get('/actualizalo/{COD_ARTICULO}',[HomeControllerenproduccion::class,'datosparaactualizar']);
Route::put('/actualizar',[HomeControllerenproduccion::class, 'actualizar'])->name('actualizar'); //cambiar a metodo put
Route::delete('/eliminarE/{COD_ARTICULO}',[HomeControllerenproduccion::class,'eliminar'])->name('eliminar.eliminar');


Route::get('/actualizarP/{id}',[HomeControllerenproduccion::class,'datosparaactualizarP']);