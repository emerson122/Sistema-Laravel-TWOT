<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientes\ClientesController;

Route::get('',[ClientesController::class, 'index']);
Route::get('/productos1',[ClientesController::class, 'verproductos1']);
Route::get('/productos2',[ClientesController::class, 'verproductos2']);
Route::get('/productos3',[ClientesController::class, 'verproductos3']);
Route::get('/productos4',[ClientesController::class, 'verproductos4']);


