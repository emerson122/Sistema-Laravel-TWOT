<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Inicio\HomeController;

//aqui se esta llamando el controlador HomeController con la clase index
Route::get('',[HomeController::class, 'index']);
Route::get('asset',[HomeController::class, 'principal']);
//Route::get('',[HomeController::class, 'productos']);