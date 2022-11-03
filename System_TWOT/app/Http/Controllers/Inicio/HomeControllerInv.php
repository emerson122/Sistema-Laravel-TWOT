<?php

namespace App\Http\Controllers\Inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


//mensajes en pantalla
use Illuminate\Support\Facades\Session;

class HomeControllerInv extends Controller
{
    public function index()
    {
        $inventario = Http::get('http://localhost:3000/inventario');
        $inventarioArreglo =  $inventario->json();
        return view('inicio.inventario', compact('inventarioArreglo'));
    }

    public function inventario()
    {


        $inventario = Http::get('http://localhost:3000/inventario');
        $inventarioArreglo = $inventario->json();
        return view('IndexInv.php', compact('inventarioArreglo'));
    }

    public function insertar(Request $request)
    {
        //agregarle comillass a los strings
        $NOM_PRODUCTOS = $_POST['NOM_PRODUCTOS'];
        $PROVEEDORES = $_POST['PROVEEDORES'];
        $MARCA = $_POST['MARCA'];
        $CATEGORIAS = $_POST['CATEGORIAS'];
        $NUEVOPRODUCTO = "'$NOM_PRODUCTOS'";
        $NUEVOSPROVEEDORES = "'$PROVEEDORES'";
        $NUEVAMARCA = "'$MARCA'";
        $NUEVASCATEGORIAS = "'$CATEGORIAS'";

        //metodo post
        $insertarinventario = Http::post('http://localhost:3000/inventario/insertar', [
            //
            "COD_PRODUCTO" => $request->codprod,
            "COD_EMPRESA" => $request->codemp,
            "NOM_PRODUCTOS" => $NUEVOPRODUCTO,
            "PROVEEDORES" => $NUEVOSPROVEEDORES,
            "MARCA" => $NUEVAMARCA,
            "UNIDADES" => $request->UNIDADES,
            "CATEGORIAS" => $NUEVASCATEGORIAS,
        ]);

        //return response()->json($request,200);
        // Session::flash('message','Se registro correctamente');
        return redirect('/inventario');
    }
    public function crear()
    {
        return view('CrearInv.php');
    }

    public function datosparaactualizar($id)
    {  //leer un registro para modificar y editarlo
        $inventario = Http::get('http://localhost:3000/inventario/' . $id);

        $inventarioArreglo =  json_decode($inventario, true);
        //return view('EditarInv.php', compact('inventarioArreglo'));

        return $inventarioArreglo;
    }



    public function actualizar(Request $request)
    {

        //agregarle comillass a los strings
        $NOM_PRODUCTOS = $_POST['NOM_PRODUCTOS'];
        $PROVEEDORES = $_POST['PROVEEDORES'];
        $MARCA = $_POST['MARCA'];
        $CATEGORIAS = $_POST['CATEGORIAS'];
        $NUEVOPRODUCTO = "'$NOM_PRODUCTOS'";
        $NUEVOSPROVEEDORES = "'$PROVEEDORES'";
        $NUEVAMARCA = "'$MARCA'";
        $NUEVASCATEGORIAS = "'$CATEGORIAS'";

        $inventario = Http::put('http://localhost:3000/inventario/actualizar/' . $request->inventario, [
            "COD_PRODUCTO" => $request->codprod,
            "COD_EMPRESA" => $request->codemp,
            "NOM_PRODUCTOS" => $NUEVOPRODUCTO,
            "PROVEEDORES" => $NUEVOSPROVEEDORES,
            "MARCA" => $NUEVAMARCA,
            "UNIDADES" => $request->UNIDADES,
            "CATEGORIAS" => $NUEVASCATEGORIAS,

        ]);
        return redirect('/inventario');
        //return $request;
    }

    public function eliminar($id)
    { //eliminar un registro
        //echo $id;

        $inventario = Http::delete('http://localhost:3000/inventario/borrar/' . $id);
        return redirect('/inventario');
    }
}
