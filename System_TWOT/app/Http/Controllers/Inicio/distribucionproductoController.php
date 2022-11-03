<?php

namespace App\Http\Controllers\inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Http;
/*error_reporting(0);*/

class distribucionproductoController extends Controller
{
    public function distribucionproducto()
    {
        $distribucionproducto = http::get('http://localhost:3000/distribucionproducto/');
        $distribucionproductoArreglo = $distribucionproducto->json();
        $ventas = Http::get('http://localhost:3000/Ventas');
        $ventasArreglo = json_decode($ventas, true);
        return view('inicio.distribucionproducto', compact('distribucionproductoArreglo', 'ventasArreglo'));
    }


    public function insertar(Request $request)
    {
        //agregarle comillass a los strings
        $nombreDepart = $_POST['nombreDepart'];
        $nuevonombreDepart = "'$nombreDepart'";

        $lugar_entrega = $_POST['lugar_entrega'];
        $nuevolugar_entrega = "'$lugar_entrega'";

        $nombre = $_POST['nombre'];
        $nuevonombre = "'$nombre'";


        //metodo post
        $distribucionproducto = Http::post('http://localhost:3000/distribucionproducto/nuevo', [
            "COD_PERSONA" => $request->COD_PERSONA,
            "COD_PRODUCTO" => $request->COD_PRODUCTO,
            "COD_VENTA" => $request->COD_VENTA,
            "nombreDepart" => $nuevonombreDepart,
            "lugar_entrega" => $nuevolugar_entrega,
            "nombre" => $nuevonombre,


        ]);


        //return response()->json($request,200);
        Session::flash('message', 'Se registro correctamente');
        return redirect('/distribucionproducto');

        //return response()->json($request,200);
        //Session::flash('message','Se registro correctamente');
        //return redirect('/distribucionproducto');
    }
    public function crear()
    {
        return view('inicio.creardistribucionproducto');
    }



    public function datosparaactualizardis($id)
    {  //leer un registro para modificar y editarlo
        $distribucionproducto = Http::get('http://localhost:3000/distribucionproducto/' . $id);
        $distribucionproductoArreglo =  json_decode($distribucionproducto, true);
        return view('inicio.editardistribucionproducto', compact('distribucionproductoArreglo'));
        /*echo $id;*/
    }

    /////////////////////////////EDITAR//////////////////////////////////
    //datos para actualizar productos
    public function datosparaactualizarD($id)
    {  //leer un registro para modificar y editarlo
        $ventas = Http::get('http://localhost:3000/ventas/' . $id);
        $ventasArreglo =  json_decode($ventas, true);
        return $ventasArreglo;
        //return view('inicio.ventas',compact('producto'));

    }


    public function actualizardis(Request $request)
    {

        //agregarle comillass a los strings
        $nombreDepart = $_POST['nombreDepart'];
        $nuevonombreDepart = "'$nombreDepart'";

        $lugar_entrega = $_POST['lugar_entrega'];
        $nuevolugar_entrega = "'$lugar_entrega'";

        $nombre = $_POST['nombre'];
        $nuevonombre = "'$nombre'";

        $distribucionproducto = Http::put('http://localhost:3000/distribucionproducto/actualizar/' . $request->distribucionproducto, [

            "COD_PERSONA" => $request->COD_PERSONA,
            "COD_PRODUCTO" => $request->COD_PRODUCTO,
            "COD_VENTA" => $request->COD_VENTA,
            "nombreDepart" => $nuevonombreDepart,
            "lugar_entrega" => $nuevolugar_entrega,
            "nombre" => $nuevonombre,

        ]);
        return redirect('/distribucionproducto');
        //return $request;
    }

    public function eliminardis($id)
    { //eliminar un registro
        //echo $id;

        $distribucionproducto = Http::delete('http://localhost:3000/distribucionproducto/borrar/' . $id);
        return redirect('/distribucionproducto');
    }
}
