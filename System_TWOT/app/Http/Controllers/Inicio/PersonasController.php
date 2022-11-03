<?php

namespace App\Http\Controllers\inicio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

//importar esta libreria para el login

//use Illuminate\Support\Facades\Auth;

class PersonasController extends Controller
{
    public function index()
    {
        $personas = Http::get('http://localhost:3000/personas');
        $PersonasArreglo =  json_decode($personas, true);
        $correo = Http::get('http://localhost:3000/correos');
        $correoArreglo =  json_decode($correo, true);
        $rol = Http::get('http://localhost:3000/rol');
        $rolArreglo =  json_decode($rol, true);

        return view('inicio.personas.users', compact('PersonasArreglo', 'correoArreglo', 'rolArreglo'));
    }
    public function pantalla()
    {
        return view('login.registrar');
    }

    public function revisar()
    {
        $emailSIN = $_POST['email'];
        $contra = $_POST['pass'];

        $validar = Http::get('http://localhost:3000/Correos');
        $validarArreglo =  $validar->json();

        $email = $validarArreglo[0]['CORREO'];
        $contra = $validarArreglo[0]['CONTRASEÑA'];


        return sizeof($validarArreglo);

        //$email = request()->only('email');
        //$pass = request()->only('pass');

        $i = 0;
        while ($i <= sizeof($validarArreglo) - 1) {
            if ($emailSIN == $validarArreglo[$i]['CORREO']) {
                return 'si';
                //if ($pass == $validarArreglo[$i]['CONTRASEÑA']){ }
            } else {
                return 'no';
            }
            $i = $i + 1;
        }
        /* foreach ($email as  $value) {
            if($value == $emailSIN ){
                return 'SI';
            }else{
                return 'NO';
            }
        
        }*/
        //return $email;




        //dump($email,$pass);



        // Auth::attemp($credenciales);
    }


    public function datosparaactualizar($id)
    {  //leer un registro para modificar y editarlo
        $personas = Http::get('http://localhost:3000/personas/leer/' . $id);
        $personasArreglo =  json_decode($personas, true);
        return $personasArreglo;
        //return 'hola';
    }

    public function registrar(Request $request)
    {

        $name = $_POST['name'];
        $nombrenuevo = "'$name'";
        $email = $_POST['email'];
        $emailN = "'$email'";
        $Cont = $_POST['pass'];

        //encriptarcontrasena
        $encriptada = md5($Cont);
        $contra = "'$encriptada'";

        $insertar = Http::post('http://localhost:3000/personas/agregar', [

            "NOM_PERSONA" => $nombrenuevo,
            "SEX_PERSONA" => $request->Genero,
            "EDAD_PERSONAL" => $request->edad,
            "TIP_PERSONA" => $request->rango,
            "Num_Identidad" => $request->identidad,
            "IND_CIVIL" => $request->Estado,
            "IND_PERSONA" => $request->indPersonas
        ]);
        $insertarC = Http::post('http://localhost:3000/Correos/nuevo', [
            "COD_PERSONA" => $request->CodemailP,
            "CORREO" => $emailN,
            "CONTRASEÑA" => $contra
        ]);

        $insertarR = Http::post('http://localhost:3000/Rol/nuevo', [

            "COD_PERSONA" => $request->CodemailP,
            "ROL_PER" => $request->rango,
            "DESCR" => "nuevo",
            "ESTADO" => 1

        ]);

        //$genero= $_POST['Genero'];
        //dump($name,$genero);
        return redirect('/inicio');
    }

    public function update(Request $request)
    {

        $name = $_POST['name'];
        $nombrenuevo = "'$name'";
        $email = $_POST['email'];
        $emailN = "'$email'";
        $Cont = $_POST['pass'];
        $contra = "'$Cont'";
        $insertar = Http::put('http://localhost:3000/personas/actualizar/' . $request->codigo, [

            "NOM_PERSONA" => $nombrenuevo,
            "SEX_PERSONA" => $request->Genero,
            "EDAD_PERSONAL" => $request->edad,
            "TIP_PERSONA" => $request->rango,
            "Num_Identidad" => $request->identidad,
            "IND_CIVIL" => $request->Estado,
            "IND_PERSONA" => $request->indPersonas
        ]);
        $insertarC = Http::post('http://localhost:3000/Correos/actualizar/' . $request->codigo, [
            "COD_PERSONA" => $request->CodemailP,
            "CORREO" => $emailN,
            "CONTRASEÑA" => $contra
        ]);

        $insertarR = Http::post('http://localhost:3000/Rol/nuevo', [

            "COD_PERSONA" => $request->CodemailP,
            "ROL_PER" => $request->rango,
            "DESCR" => "nuevo",
            "ESTADO" => 1

        ]);
        return redirect("/personas/users");
    }
    public function eliminar($cod_persona)
    {
        $persona = Http::delete('http://localhost:3000/personas/borrar/' . $cod_persona);
        return redirect('/personas/users');
    }
}
