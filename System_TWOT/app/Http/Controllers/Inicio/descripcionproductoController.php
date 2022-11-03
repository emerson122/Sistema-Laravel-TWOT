<?php

namespace App\Http\Controllers\inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Http;


class descripcionproductoController extends Controller
{
    public function descripcionproducto()
    {
        $descripcionproducto = http::get('http://localhost:3000/descripcionproducto');
        $descripcionproductoArreglo = $descripcionproducto->json();
        $inventario = Http::get('http://localhost:3000/inventario');
        $inventarioArreglo = json_decode($inventario, true);
        return view('inicio.descripcionproducto', compact('descripcionproductoArreglo', 'inventarioArreglo'));
    }


    public function insertar(Request $request)
    {
        //agregarle comillass a los strings
        $nombreproduct = $_POST['nombreproduct'];
        $nuevonombreproduct = "'$nombreproduct'";

        $color = $_POST['color'];
        $nuevocolor = "'$color'";

        $tamano = $_POST['tamano'];
        $nuevotamano = "'$tamano'";


        //metodo post
        $descripcionproducto = Http::post('http://localhost:3000/descripcionproducto/NuevaDescprod', [
            "COD_PRODUCTO" => $request->COD_PRODUCTO,
            "nombreproduct" => $nuevonombreproduct,
            "precioproduct" => $request->precioproduct,
            "cantidadproduct" => $request->cantidadproduct,
            "color" => $nuevocolor,
            "tamano" => $nuevotamano,


        ]);

        //return response()->json($request,200);
        Session::flash('message', 'Se registro correctamente');
        return redirect('/descripcionproducto');
    }
    public function crear()
    {
        return view('inicio.creardescripcionproducto');
    }


    public function datosparaactualizardes($id)
    {  //leer un registro para modificar y editarlo
        $descripcionproducto = Http::get('http://localhost:3000/descripcionproducto/' . $id);
        $descripcionproductoArreglo =  json_decode($descripcionproducto, true);
        return view('inicio.editardescripcionproducto', compact('descripcionproductoArreglo'));
        /*echo $id;*/
    }



    public function actualizardes(Request $request)
    {

        //agregarle comillass a los strings
        $nombreproduct = $_POST['nombreproduct'];
        $nuevonombreproduct = "'$nombreproduct'";

        $color = $_POST['color'];
        $nuevocolor = "'$color'";

        $tamano = $_POST['tamano'];
        $nuevotamano = "'$tamano'";


        $descripcionproducto = Http::put('http://localhost:3000/descripcionproducto/actualizar/' . $request->descripcionproducto, [
            "COD_PRODUCTO" => $request->COD_PRODUCTO,
            "nombreproduct" => $nuevonombreproduct,
            "precioproduct" => $request->precioproduct,
            "cantidadproduct" => $request->cantidadproduct,
            "color" => $nuevocolor,
            "tamano" => $nuevotamano,

        ]);
        return redirect('/descripcionproducto');
        //return $request;
    }


    public function eliminardes($id)
    { //eliminar un registro
        //echo $id;

        $descripcionproducto = Http::delete('http://localhost:3000/descripcionproducto/borrar/' . $id);
        return redirect('/descripcionproducto');
    }
}
