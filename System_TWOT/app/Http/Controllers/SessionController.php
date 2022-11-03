<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function crear(){
        return view('auth.login');
    }

    public function buscar(){
        $emailSIN = $_POST['email'];
        $contrasinencriptar =  $_POST['pass'];
        $contra = md5($contrasinencriptar);
        $validar = Http::get('http://localhost:3000/Correos');
        $validarArreglo =  $validar->json();
        /*
        //proba el encriptado de la contrasena
        if($contra == $validarArreglo[3]['CONTRASEÑA'] ){
            return 'si' ;
        }else{
            return $contra. ' ---- ' . 'aqui esta lo de la base de datos ---- ' .  $validarArreglo[3]['CONTRASEÑA'];
        }
        */
        //return sizeof($validarArreglo); //funcion que devuelve los valores del arreglo

        // /* comentar coon esto
        $i=0;
        while ($i <= sizeof($validarArreglo) - 1) {
            if ($emailSIN == $validarArreglo[$i]['CORREO']){
                //return 'si';
                $iddelcorreo = $i;
                //modificar esta parte debe con el correo que se consiguio anteriormente se debe buscar por el id si ña contraseña y el correo coniciden, no que el correo exita en la bd
                if ($contra == $validarArreglo[$iddelcorreo]['CONTRASEÑA']){ 
                    
                    $quepersonaseEstaLogueando = $validarArreglo[$iddelcorreo]['COD_PERSONA'];

                    $rol = Http::get('http://localhost:3000/rol');
                    $rolArreglo = $rol->json();
                    $r=0;
                    while ($r <= sizeof($rolArreglo) - 1) {
                        if ($quepersonaseEstaLogueando == $rolArreglo[$r]['COD_PERSONA']){
                            $roldelapersona = $rolArreglo[$r]['ROL_PER'];

                            if ($roldelapersona == 'C'){
                                return redirect('/clientes');
                                
                            }elseif($roldelapersona == 'A'){
                                return redirect('/inicio');
                            }
                    }
                    $r++;
                }
                   
                }else{
                    Session::flash('contramala','LA CONTRASEÑA ES  INCORRECTA');   
                    return back();     
                }
            }
            $i++;
        }  
        Session::flash('NOregistrado','TU CORREO NO ESTA REGISTRADO');   
        return back();   
         //  */   
    }
   
}
