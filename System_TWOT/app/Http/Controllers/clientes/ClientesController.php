<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientesController extends Controller
{
    /* public function __construct(){
        $this->middleware('auth');
    }  */
    public function index()
    {
        return view('clientes.clientes');
    }
    public function verproductos1()
    {
        $productos1 = Http::get('http://localhost:8080/imagenes/todoslosproductos');
        $productos1Arreglo =  json_decode($productos1, true);
        $inventario = Http::get('http://localhost:3000/inventario');
        $inventarioArreglo = json_decode($inventario, true);
        $productoGanancia = Http::get('http://localhost:3000/producto');
        $productoGananciaArreglo = json_decode($productoGanancia, true);
        return view('clientes.productos1', compact('productos1Arreglo', 'inventarioArreglo', 'productoGananciaArreglo'));
    }
    public function verproductos2()
    {
        $productos2 = Http::get('http://localhost:8080/imagenes/todoslosproductos');
        $productos1Arreglo =  json_decode($productos2, true);
        $inventario = Http::get('http://localhost:3000/inventario');
        $inventarioArreglo = json_decode($inventario, true);
        $productoGanancia = Http::get('http://localhost:3000/producto');
        $productoGananciaArreglo = json_decode($productoGanancia, true);
        return view('clientes.productos2', compact('productos1Arreglo', 'inventarioArreglo', 'productoGananciaArreglo'));
    }
    public function verproductos3()
    {
        return view('clientes.productos3');
    }
    public function verproductos4()
    {
        return view('clientes.productos4');
    }
}
