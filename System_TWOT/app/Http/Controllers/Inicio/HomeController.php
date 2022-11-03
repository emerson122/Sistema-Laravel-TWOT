<?php

namespace App\Http\Controllers\Inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
  public function index()
  {
    $conteo = Http::get('http://localhost:3000/conteo');
    $conteoArreglo =  $conteo->json();
    $contabilidad = Http::get('http://localhost:3000/contabilidad');
    $contaArreglo =  $contabilidad->json();

    return view('inicio.index', compact('conteoArreglo', 'contaArreglo'));
  }

  public function principal()
  {
    return view('asset.img');
  }

  //$response = Http::post('http://example.com/users', [
  //'name' => 'Steve',
  //'role' => 'Network Administrator',
  //]);
  //public function productos(){
  //  $ventas = Http::get('http://localhost:3000/Ventas');
  //   $ventasArreglo =  $ventas->json();
  //      return view('inicio.productos', compact('ventasArreglo'));
  //  }

}
