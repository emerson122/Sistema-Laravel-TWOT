<?php

namespace App\Http\Controllers\inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeControllerProducto extends Controller
{
    public function index()
    {
        $producto = Http::get('http://localhost:3000/producto');
        $productoArreglo =  $producto->json();
        return view('inicio.Producto', compact('productoArreglo'));
    }


    public function producto()
    {


        $producto = Http::get('http://localhost:3000/producto');
        $productoArreglo = $producto->json();
        return view('IndexPro.php', compact('productoArreglo'));
    }

    public function insertar(Request $request)
    {
        //agregarle comillass a los strings
        $NOM_PRODUCTO = $_POST['NOM_PRODUCTO'];
        $PROVEEDOR = $_POST['PROVEEDOR'];
        $MARCA = $_POST['MARCA'];
        $NUEVOPRODUCTO = "'$NOM_PRODUCTO'";
        $NUEVOPROVEEDOR = "'$PROVEEDOR'";
        $NUEVAMARCA = "'$MARCA'";

        //metodo post
        $insertarinventario = Http::post('http://localhost:3000/producto/insertar', [
            "COD_EMPRESA" => $request->codEmpresa,
            "NOM_PRODUCTO" => $NUEVOPRODUCTO,
            "PROVEEDOR" => $NUEVOPROVEEDOR,
            "MARCA" => $NUEVAMARCA,
            "PRECIO" => $request->PRECIO,
            "UNIDADES" => $request->UNIDADES,

        ]);

        //return response()->json($request,200);
        //Session::flash('message','Se registro correctamente');
        return redirect('/producto');
    }
    public function crear()
    {
        return view('CrearPro.php');
    }

    public function datosparaactualizar($id)
    {  //leer un registro para modificar y editarlo
        $producto = Http::get('http://localhost:3000/producto/' . $id);
        $productoArreglo =  json_decode($producto, true);
        return $productoArreglo;

        //echo $id;
    }



    public function actualizar(Request $request)
    {

        //agregarle comillass a los strings
        $NOM_PRODUCTO = $_POST['NOM_PRODUCTO'];
        $PROVEEDOR = $_POST['PROVEEDOR'];
        $MARCA = $_POST['MARCA'];
        $NUEVOPRODUCTO = "'$NOM_PRODUCTO'";
        $NUEVOPROVEEDOR = "'$PROVEEDOR'";
        $NUEVAMARCA = "'$MARCA'";

        $producto = Http::put('http://localhost:3000/producto/actualizar/' . $request->producto, [
            "COD_EMPRESA" => $request->codEmpresa,
            "NOM_PRODUCTO" => $NUEVOPRODUCTO,
            "PROVEEDOR" => $NUEVOPROVEEDOR,
            "MARCA" => $NUEVAMARCA,
            "PRECIO" => $request->PRECIO,
            "UNIDADES" => $request->UNIDADES,
        ]);
        return redirect('/producto');
        //return $request;
    }

    public function eliminar($id)
    { //eliminar un registro
        //echo $id;

        $producto = Http::delete('http://localhost:3000/producto/borrar/' . $id);
        return redirect('/producto');
    }
}
