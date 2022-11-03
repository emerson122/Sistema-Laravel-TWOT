<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;




Route::get('/', function () {
    return view('home');
});

Route::get('/login',[SessionController::class,'crear'])->name('login'); //al colocar esto la persona que se intente saltar el login sera redirigida a esta ruta
Route::post('/login',[SessionController::class,'buscar']);
Route::get('/register',[RegisterController::class,'crear'])->name('register.index');

Route::get('/', function () {
    return view('home');
});
