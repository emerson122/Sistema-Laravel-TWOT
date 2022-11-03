<?php

namespace App\Http\Controllers\inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\admin\ventas;

//mensajes en pantalla
use Illuminate\Support\Facades\Session;

class VentasController extends Controller
{
    public function index()
    {  //leer todos los registros
        $ventas = Http::get('http://localhost:3000/Ventas');
        $ventasArreglo =  json_decode($ventas, true);
        $inventario = Http::get('http://localhost:3000/inventario');
        $inventarioArreglo = json_decode($inventario, true);
        return view('inicio.ventas', compact('ventasArreglo', 'inventarioArreglo'));
    }


    public function insertar(Request $request) //insertar un registro
    {
        //agregarle comillass a los strings
        $nombre = $_POST['nombre'];
        $destino = $_POST['destino'];
        $nombrenuevo = "'$nombre'";
        $destinonuevo = "'$destino'";

        //metodo post
        $insertarVentas = Http::post('http://localhost:3000/ventas/agregar', [
            "COD_INV" => $request->INV,
            "COD_PERSONA" => $request->personas,
            "COD_PRODUCTO" => $request->cod_Producto,
            "NOM_PRODUCTO" => $nombrenuevo,
            "CANT_PRODUCTO" => $request->cantidad,
            "PREC_UNITARIO" => $request->precio,
            "TOTAL_BRUTO" => $request->totalb,
            "DESTINO_VENTA" => $destinonuevo,
            "IMPUE_TOTAL" => $request->impuesto,
            "TOTAL_VENTA" => $request->total

        ]);
        //restar producto del inventario
        $NUM1 = Http::get('http://localhost:3000/ventas/selinventario/' . $request->INV);
        $normal = $NUM1[0]['UNIDADES'];
        $resta = $normal - $request->cantidad;

        http::put('http://localhost:3000/ventas/inventario/' . $request->INV, [
            "UNIDADES" => $resta
        ]);

        //aumentar ingresos
        http::put('http://localhost:3000/ingresos', [
            "INGRESOS" => $request->total,
            "EGRESOS" => $request->total
        ]);


        //return response()->json($request,200);
        return back(); //retorna a la dirreccion anterior
    }


    public function crear()
    { //crear un registro
        return view('inicio.crearventa');
    }



    public function datosparaactualizar($id)
    {  //leer un registro para modificar y editarlo
        $ventas = Http::get('http://localhost:3000/Ventas/Leer/' . $id);
        $ventasArreglo =  json_decode($ventas, true);
        return $ventasArreglo;
    }

    //datos para actualizar productos
    public function datosparaactualizarP($id)
    {  //leer un registro para modificar y editarlo
        $producto = Http::get('http://localhost:3000/inventario/' . $id);
        $productoArreglo =  json_decode($producto, true);
        return $productoArreglo;
        //return view('inicio.ventas',compact('producto'));

    }



    public function actualizar(Request $request)
    {

        $nombre = $_POST['nombre'];
        $destino = $_POST['destino'];
        $nombrenuevo = "'$nombre'";
        $destinonuevo = "'$destino'";

        $ventas = Http::put('http://localhost:3000/ventas/actualizar/' . $request->venta, [
            "COD_INV" => $request->INV,
            "COD_PERSONA" => $request->personas,
            "COD_PRODUCTO" => $request->cod_Producto,
            "NOM_PRODUCTO" => $nombrenuevo,
            "CANT_PRODUCTO" => $request->cantidad,
            "PREC_UNITARIO" => $request->precio,
            "TOTAL_BRUTO" => $request->totalb,
            "DESTINO_VENTA" => $destinonuevo,
            "IMPUE_TOTAL" => $request->impuesto,
            "TOTAL_VENTA" => $request->total

        ]);
        return redirect('/ventas');
        //return $request;
    }


    public function eliminar($cod_venta)
    { //eliminar un registro
        echo $cod_venta;

        $ventas = Http::delete('http://localhost:3000/ventas/borrar/' . $cod_venta);
        return redirect('/ventas');
    }
}
