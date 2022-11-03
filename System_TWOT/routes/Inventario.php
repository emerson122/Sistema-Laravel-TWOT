<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Inicio\HomeControllerInv;

//aqui se esta llamando el controlador HomeController con la clase index
Route::get('',[HomeControllerInv::class, 'index']);
Route::get('/crear',[HomeControllerInv::class, 'crear']);
Route::get('/editar',[HomeControllerInv::class, 'editar']);
Route::post('/agregar',[HomeControllerInv::class, 'insertar']);
Route::get('/actualizalo/{COD_INV}',[HomeControllerInv::class,'datosparaactualizar']);
Route::put('/actualizar',[HomeControllerInv::class, 'actualizar'])->name('actualizar'); //cambiar a metodo put
Route::delete('/eliminarV/{COD_INV}',[HomeControllerInv::class,'eliminar'])->name('eliminari.eliminari');

//NUEVA RUTA PARA EL el insertar de inventario
Route::get('/actualizarP/{id}',[HomeControllerInv::class,'datosparaactualizarP']);