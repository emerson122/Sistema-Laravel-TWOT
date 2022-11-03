<?php

namespace App\Http\Controllers\inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class reportes extends Controller
{
    public function index()
    {
        $conteo = Http::get('http://localhost:3000/conteo');
        $conteoArreglo =  $conteo->json();
        $contabilidad = Http::get('http://localhost:3000/contabilidad');
        $contaArreglo =  $contabilidad->json();

        return view('inicio.reportes.reporte', compact('conteoArreglo', 'contaArreglo'));
    }
}
