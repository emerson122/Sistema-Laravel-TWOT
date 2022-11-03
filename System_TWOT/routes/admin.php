<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;

Route::get('',[PruebaController::class, 'index']);