<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Inicio\VentasController;

//aqui se esta llamando el controlador HomeController con la clase index
Route::get('',[VentasController::class, 'index']);
Route::get('/crear',[VentasController::class, 'crear']);
Route::get('/editar',[VentasController::class, 'editar']);
Route::post('/agregar',[VentasController::class, 'insertar']);
Route::get('/actualizalo/{COD_VENTA}',[VentasController::class,'datosparaactualizar']);
Route::put('/actualizar',[VentasController::class, 'actualizar'])->name('actualizar'); //cambiar a metodo put
Route::delete('/eliminarV/{COD_VENTA}',[VentasController::class,'eliminar']);

//NUEVA RUTA PARA EL el insertar de producto
Route::get('/actualizarP/{id}',[VentasController::class,'datosparaactualizarP']);
