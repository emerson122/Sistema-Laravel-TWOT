<?php

namespace App\Http\Controllers\Inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


//mensajes en pantalla
use Illuminate\Support\Facades\Session;

class HomeControllerfabricante extends Controller
{
    public function index()
    {
        $ventas = Http::get('http://localhost:3000/Ventas');
        $ventasArreglo =  $ventas->json();
        return view('inicio.index', compact('ventasArreglo'));

        //$fabricante = Http::get('http://localhost:3000/fabricante');
        //$fabricanteArreglo = $fabricante->json();
        //return view('inicio.fabricante', compact('fabricanteArreglo'));
    }

    public function fabricante()
    {


        $fabricante = Http::get('http://localhost:3000/fabricante');
        $fabricanteArreglo = $fabricante->json();
        return view('inicio.fabricante', compact('fabricanteArreglo'));
    }

    public function insertar(Request $request)
    {
        //agregarle comillass a los strings
        $PROVEEDORES = $_POST['PROVEEDORES'];
        $DIR_EMPRESA = $_POST['DIR_EMPRESA'];
        $COR_EMPRESA = $_POST['COR_EMPRESA'];
        $NOM_PRODUCTO = $_POST['NOM_PRODUCTO'];
        $NUEVOPROVEEDOR = "'$PROVEEDORES'";
        $NUEVODIR_EMPRESA = "'$DIR_EMPRESA'";
        $NUEVOCOR_EMPRESA = "'$COR_EMPRESA'";
        $NUEVONOM_PRODUCTO = "'$NOM_PRODUCTO'";

        //metodo post
        $insertarfabricante = Http::post('http://localhost:3000/fabricante/insertar', [
            "PROVEEDORES" => $NUEVOPROVEEDOR,
            "DIR_EMPRESA" => $NUEVODIR_EMPRESA,
            "TEL_EMPRESA" => $request->TEL_EMPRESA,
            "COR_EMPRESA" => $NUEVOCOR_EMPRESA,
            "NOM_PRODUCTO" => $NUEVONOM_PRODUCTO,
            "UNIDADES" => $request->UNIDADES,
            "COS_PRODUCTO" => $request->COS_PRODUCTO,


        ]);

        //return response()->json($request,200);
        Session::flash('message', 'Se registro correctamente');
        return redirect('/fabricante');
    }
    public function crear()
    {
        return view('inicio.crearfabricante');
    }

    /*public function enproduccion(){
          $enproduccion = Http::get('http://localhost:3000/enproduccion');
      $enproduccionArreglo = $enproduccion->json();
      return view('inicio.enproduccion', compact('enproduccionArreglo'));

      


   }*/
    public function datosparaactualizar($id)
    {  //leer un registro para modificar y editarlo
        $fabricante = Http::get('http://localhost:3000/fabricante/' . $id);
        $fabricanteArreglo =  json_decode($fabricante, true);
        return  $fabricanteArreglo;

        //echo $id;
    }





    public function actualizar(Request $request)
    {

        //agregarle comillass a los strings
        $PROVEEDORES = $_POST['PROVEEDORES'];
        $DIR_EMPRESA = $_POST['DIR_EMPRESA'];
        $COR_EMPRESA = $_POST['COR_EMPRESA'];
        $NOM_PRODUCTO = $_POST['NOM_PRODUCTO'];
        $NUEVOPROVEEDOR = "'$PROVEEDORES'";
        $NUEVODIR_EMPRESA = "'$DIR_EMPRESA'";
        $NUEVOCOR_EMPRESA = "'$COR_EMPRESA'";
        $NUEVONOM_PRODUCTO = "'$NOM_PRODUCTO'";

        $fabricante = Http::put('http://localhost:3000/fabricante/actualizar/' . $request->fabricante, [
            "PROVEEDORES" => $NUEVOPROVEEDOR,
            "DIR_EMPRESA" => $NUEVODIR_EMPRESA,
            "TEL_EMPRESA" => $request->TEL_EMPRESA,
            "COR_EMPRESA" => $NUEVOCOR_EMPRESA,
            "NOM_PRODUCTO" => $NUEVONOM_PRODUCTO,
            "UNIDADES" => $request->UNIDADES,
            "COS_PRODUCTO" => $request->COS_PRODUCTO,

        ]);
        return redirect('/fabricante');
        //return $request;
    }

    public function eliminar($COD_EMPRESA)
    { //eliminar un registro
        echo $COD_EMPRESA;

        $fabricante = Http::delete('http://localhost:3000/fabricante/borrar/' . $COD_EMPRESA);
        return redirect('/fabricante');
    }
}
