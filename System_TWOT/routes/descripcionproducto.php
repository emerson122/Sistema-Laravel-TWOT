<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Inicio\descripcionproductoController;



Route::get('',[descripcionproductoController::class, 'index']);


Route::get('',[descripcionproductoController::class, 'descripcionproducto']);

//Route::get('',[descripcionproductoController::class, 'de']);

//Route::get('',[HomeController::class, 'enproduccion']);

Route::get('/crear',[descripcionproductoController::class, 'crear']);
Route::get('/editar',[descripcionproductoController::class, 'editar']);
Route::post('/agregar',[descripcionproductoController::class, 'insertar']);

Route::get('/actualizalodes/{cod_descproducto}',[descripcionproductoController::class,'datosparaactualizardes']);
Route::put('/actualizardes',[descripcionproductoController::class, 'actualizardes'])->name('actualizardes'); //cambiar a metodo put
Route::delete('/eliminardes/{id}',[descripcionproductoController::class,'eliminardes'])->name('eliminardes.eliminardes');


Route::get('/actualizardes/{id}',[descripcionproductoController::class,'datosparaactualizardes']);