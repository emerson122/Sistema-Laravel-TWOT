<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\inicio\HomeControllerProducto;


//aqui se esta llamando el controlador HomeController con la clase index
Route::get('',[HomeControllerProducto::class, 'index']);
Route::get('/crear',[HomeControllerProducto::class, 'crear']);
Route::get('/editar',[HomeControllerProducto::class, 'editar']);
Route::post('/agregar',[HomeControllerProducto::class, 'insertar']);
Route::get('/actualizalo/{COD_PRODUCTO}',[HomeControllerProducto::class,'datosparaactualizar']);
Route::put('/actualizar',[HomeControllerProducto::class, 'actualizar'])->name('actualizar'); //cambiar a metodo put
Route::delete('/eliminarV/{COD_PRODUCTO}',[HomeControllerProducto::class,'eliminar']);

//NUEVA RUTA PARA EL el insertar de producto
Route::get('/actualizarP/{id}',[HomeControllerProducto::class,'datosparaactualizarP']);