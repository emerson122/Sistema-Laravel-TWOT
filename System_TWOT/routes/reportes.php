<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Inicio\reportes;
Route::get('',[reportes::class, 'index']);