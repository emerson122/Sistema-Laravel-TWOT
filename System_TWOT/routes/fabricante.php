<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Inicio\HomeControllerfabricante;



Route::get('',[HomeController::class, 'index']);


Route::get('',[HomeControllerfabricante::class, 'fabricante']);


////nuevas para post */
Route::get('/crear',[HomeControllerfabricante::class, 'crear']);
Route::get('/editar',[HomeControllerfabricante::class, 'editar']);
Route::post('/agregar',[HomeControllerfabricante::class, 'insertar']);


//////nuevas para put*/
Route::get('/actualizalo/{COD_EMPRESA}',[HomeControllerfabricante::class,'datosparaactualizar']);
Route::put('/actualizar',[HomeControllerfabricante::class, 'actualizar'])->name('actualizar'); //cambiar a metodo put
Route::delete('/eliminarF/{COD_EMPRESA}',[HomeControllerfabricante::class,'eliminar'])->name('eliminarf.eliminarf');




