<?php

namespace App\Http\Controllers\Inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;



class HomeControllerenproduccion extends Controller
{

    public function enproduccion()
    {
        $enproduccion = Http::get('http://localhost:3000/enproduccion');
        $enproduccionArreglo =  json_decode($enproduccion, true);
        /*$enproduccionArreglo = $enproduccion->json();
    
   
   return view('inicio.enproduccion', compact('enproduccionArreglo'));*/
        $fabricante = Http::get('http://localhost:3000/fabricante/');
        $fabricanteArreglo =  json_decode($fabricante, true);
        return view('inicio.enproduccion', compact('enproduccionArreglo', 'fabricanteArreglo'));
    }




    public function insertar(Request $request)
    {
        //agregarle comillass a los strings
        $NOM_PROD_EN = $_POST['NOM_PROD_EN'];
        $NUEVONOM_PROD_EN = "'$NOM_PROD_EN'";


        //metodo post
        $insertarenproduccion = Http::post('http://localhost:3000/enproduccion/insertar', [
            "COD_EMPRESA" => $request->COD_EMPRESA,
            "NOM_PROD_EN" => $NUEVONOM_PROD_EN,
            "CAN_PRODUCTO" => $request->CAN_PRODUCTO,
            "COS_PROD_EN" => $request->COS_PROD_EN,


        ]);

        //return response()->json($request,200);
        Session::flash('message', 'Se registro correctamente');
        return redirect('/enproduccion');
    }
    public function crear()
    {
        return view('inicio.crearenproduccion');
    }




    public function datosparaactualizar($id)
    {  //leer un registro para modificar y editarlo
        $enproduccion = Http::get('http://localhost:3000/enproduccion/' . $id);
        $enproduccionArreglo =  json_decode($enproduccion, true);
        return $enproduccionArreglo;
        /*echo $id;*/
    }



    //datos para actualizar productos
    public function datosparaactualizarP($id)
    {  //leer un registro para modificar y editarlo
        $enproduccion = Http::get('http://localhost:3000/fabricante/' . $id);
        $enproduccionArreglo =  json_decode($enproduccion, true);
        return $enproduccionArreglo;
    }








    public function actualizar(Request $request)
    {

        //agregarle comillass a los strings
        $NOM_PROD_EN = $_POST['NOM_PROD_EN'];
        $NUEVONOM_PROD_EN = "'$NOM_PROD_EN'";


        $enproduccion = Http::put('http://localhost:3000/enproduccion/actualizar/' . $request->enproduccion, [
            "COD_EMPRESA" => $request->COD_EMPRESA,
            "NOM_PROD_EN" => $NUEVONOM_PROD_EN,
            "CAN_PRODUCTO" => $request->CAN_PRODUCTO,
            "COS_PROD_EN" => $request->COS_PROD_EN,

        ]);
        return redirect('/enproduccion');
        //return $request;
    }


    public function eliminar($COD_ARTICULO)
    { //eliminar un registro
        echo $COD_ARTICULO;

        $enproduccion = Http::delete('http://localhost:3000/enproduccion/borrar/' . $COD_ARTICULO);
        return redirect('/enproduccion');
    }
}
