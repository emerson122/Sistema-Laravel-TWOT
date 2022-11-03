<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Inicio\ComprasController;

//aqui se esta llamando el controlador HomeController con la clase index
Route::get('',[ComprasController::class, 'index']);
Route::get('/realizar',[ComprasController::class, 'realizar']);
Route::get('/editar',[ComprasController::class, 'editar']);
Route::post('/agregarC',[ComprasController::class, 'insertarC']);
Route::get('/actualizar/{COD_VENTA}',[ComprasController::class,'datos']);
Route::put('/actualizarC',[ComprasController::class, 'actualizar'])->name('actualizar'); //cambiar a metodo put
Route::delete('/eliminar/{id}',[ComprasController::class,'eliminar'])->name('eliminar.eliminar');
