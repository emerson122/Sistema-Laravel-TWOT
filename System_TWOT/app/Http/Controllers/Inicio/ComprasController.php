<?php

namespace App\Http\Controllers\inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ComprasController extends Controller
{
    public function index()
    {
        $compras = Http::get('http://localhost:3000/compras');
        $comprasArreglo =  json_decode($compras, true);
        $proveedores = Http::get('http://localhost:3000/fabricante');
        $proveedoresA = json_decode($proveedores, true);
        return view('inicio.compras.compras', compact('comprasArreglo', 'proveedoresA'));
    }
    public function realizar()
    {
        return view('inicio.compras.realizar');
    }
    public function insertarC(Request $request)
    {

        //agregarle comillass a los strings
        $NOM_PROD = $_POST['producto'];
        $destino = $_POST['destino'];
        $Categoria = $_POST['categoria'];
        $nombrenuevo = "'$NOM_PROD'";
        $destinonuevo = "'$destino'";
        $CategoriaC = "'$Categoria'";
        //metodo post
        $insertarCompras = Http::post('http://localhost:3000/compras/nuevaCompra', [

            "COD_EMPRESA" => $request->empresa,
            "COD_PERSONA" => $request->persona,
            "NOM_PROD" => $nombrenuevo,
            "DEST_PROD" => $destinonuevo,
            "DEST_CATEG" => $CategoriaC,
            "CANT_PROD" => $request->cantidad,
            "PREC_COMP" => $request->precio,
            "IMPUE_COMP" => $request->impuesto,
            "TOTAL_COMP" => $request->total
        ]);

        $insertarInventario = Http::post('http://localhost:3000/inventario/insertar', [
            "COD_PRODUCTO" => $request->empresa,
            "COD_EMPRESA" => $request->empresa,
            "NOM_PRODUCTOS" => $nombrenuevo,
            "PROVEEDORES" =>   $destinonuevo,
            "MARCA" =>         "'marca'",
            "UNIDADES" =>       $request->cantidad,
            "CATEGORIAS" =>    $CategoriaC
        ]);

        //aumentar egresos
        http::put('http://localhost:3000/egresos', [
            "INGRESOS" => $request->total,
            "EGRESOS" => $request->total
        ]);


        return back();
    }


    public function datos($id)
    {  //leer un registro para modificar y editarlo
        //echo $id;
        $compras = Http::get('http://localhost:3000/compras/leer/' . $id);
        $comprasArreglo =  json_decode($compras, true);
        //return view('inicio.compras.editarcompra', compact('comprasArreglo'));
        return $comprasArreglo;
    }


    public function actualizar(Request $request)
    {
        //agregarle comillass a los strings
        $NOM_PROD = $_POST['producto'];
        $destino = $_POST['destino'];
        $Categoria = $_POST['categoria'];

        $nombrenuevo = "'$NOM_PROD'";
        $destinonuevo = "'$destino'";
        $CategoriaN = "'$Categoria'";

        //metodo post
        $insertarCompras = Http::put('http://localhost:3000/compras/actualizar/' . $request->compra, [

            "COD_EMPRESA" => $request->empresa,
            "COD_PERSONA" => $request->persona,
            "NOM_PROD" => $nombrenuevo,
            "DEST_PROD" => $destinonuevo,
            "DEST_CATEG" => $CategoriaN,
            "CANT_PROD" => $request->cantidad,
            "PREC_COMP" => $request->precio,
            "IMPUE_COMP" => $request->impuesto,
            "TOTAL_COMP" => $request->total
        ]);
        return redirect('/compras');
        //return $request;
    }

    public function eliminar($id)
    {
        $compras = Http::delete('http://localhost:3000/compras/borrar/' . $id);
        return redirect('/compras');
    }
}
