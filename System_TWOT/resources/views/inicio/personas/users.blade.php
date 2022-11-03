@extends('adminlte::page')

@section('title', 'Users')


@section('content_header')
    <h1>TWOT</h1>
@stop

@section('content') 
 


<table id="ejemplo" class="table table-striped" style="width:50%">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Usuario</th>
            <th scope="col">Rol</th>
            <th scope="col">Registro</th>
            <th scope="col">ACCIONES</th>

        </tr>
</thead>
<tbody>
    @foreach($PersonasArreglo as $personas) 
    <tr>
    <td><span id="cod_v">#{{$personas['COD_PERSONA']}}</span></td>
    <td><span id="cod_v">{{$personas['NOM_PERSONA']}}</span></td>
    <td><span id="cod_v">{{$personas['TIP_PERSONA']}}</span></td>
    <td><span id="cod_v">{{substr($personas['FEC_REGISTRO'],0,10)}}</span></td>
    <td>
           
           
           <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$personas['COD_PERSONA']}}" onclick="editar({{$personas['COD_PERSONA']}})">
               Editar
            </button> 
            <!--Ventana Modal para la Alerta de Editar--->
        <div class="modal fade bd-example-modal-sm" name="{{$personas['COD_PERSONA']}}" id="modal-editar-{{$personas['COD_PERSONA']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Actualizar Registro</h4>
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
        
                <form action="{{url('personas/actualizarP')}}" method="post">
                {!! csrf_field() !!}  @method('PUT') 
                <div id="ActualizaConte-{{$personas['COD_PERSONA']}}"> <!-- inicio prueba -->
                </div>
                <button type="submit" class="btn btn-success">Actualizar </button>
                </form> 
           
           </div>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
<!-- fin de modal para actualizar dato -->
    

           <!-- Metodo de Eliminacion con modal-->              
           <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$personas['COD_PERSONA']}}">
               Eliminar
            </button> 
       </td>
       </tr>
     <!--Ventana Modal para la Alerta de Eliminar--->
     <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$personas['COD_PERSONA']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>
            
            <!-- a href="ventas" class="btn btn-danger">X</a> -->
            
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
           <form action="{{url('personas/eliminar/'.$personas['COD_PERSONA'])}}" method="post">
               @csrf @method('DELETE')
           <button  class="btn btn-danger">Eliminar</button>
           
           </form>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
           </div>
</div>
</div>
</div>
<!-- fin de modal para eliminar dato -->
    
@endforeach



 

<tr>
   
</tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script>
      Swal.fire(
  'Intefaz de Usuarios Registrados',
  'Personas',
  'success'
)
  </script>

  <script>
      $("#btn_custom").click(function(){
        $("#modal_custom").find(".modal-header").css("background", "linear-gradient(90deg, rgba(2,0,36,1) 11%, rgba(6,6,48,1) 53%, rgba(0,212,255,1) 100%)");
        $("#modal_custom").find(".modal-header").css("color", "white");
        $("#modal_custom").find(".modal-title").text("Registrar un usuario");    
        $('#modal_custom').modal('show');
    });
  </script>




<script>

    const editar = (id) =>{
        var contenid = document.querySelector('#ActualizaConte-'+id)
        
        //ojo la url no es de la Api es de un controlador que se conecta a la api
        const url= 'http://127.0.0.1:8000/personas/actualizalo/'+ id;
        fetch(url)
        .then(data=>{return data.json()})
        .then(res=>{
            //console.log(res);
            pintar(res);
        })

        function pintar(res) {
            console.log(res);
            contenid.innerHTML = ''
            for(let valor of res){
                contenid.innerHTML += `
                <fieldset>
                        <legend class="text-center header">Registrar Usuario</legend>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <label for="">Nombre</label>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text"  value="${valor.NOM_PERSONA}"placeholder="Nombre" class="form-control" required> 
                            </div>
                            <input name="codigo" type="hidden" value="${valor.COD_PERSONA}"
                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <label for="">Genero</label>
                            <div class="col-md-8">
                            <select name="Genero" class="form-control">
                                <option value="">Genero</option>

                            <option value="'f'">Femenino</option>

                            <option value="'m'">Masculino</option>

                            </select>
                            </div>
                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <label for="">Edad</label>
                                <input  name="edad" type="number"value="${valor.EDAD_PERSONAL}" placeholder="Edad" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <select name="rango" class="form-control">
                                <option value="">Rol</option>

                            <option value="'A'">Admin</option>

                            <option value="'C'">Cliente</option>

                            </select>
                                
                            </div>

                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <label for="">Identidad</label>
                                <input  name="identidad" type="text" value="${valor.Num_Identidad}" placeholder="Indentidad" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                            <select name="Estado" class="form-control">
                                <option value="">Estado Civil</option>

                            <option value="'S'">Soltero</option>

                            <option value="'C'">Casado</option>
                            <option value="'D'">Divorciado</option>
                            <option value="'V'">Viudo</option>

                            </select>
                            </div>
                            <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <!-- Activo o inactivo-->
                                <input id="l" name="indPersonas" type="hidden" value='1' class="form-control" >
                            </div>
                            <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <label for="">Email</label>
                                <input  name="CodemailP" type="hidden" VALUE="1" class="form-control" >
                                <input id="email" name="email" type="email" placeholder="Email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <label for="">Contraseña</label>
                              
                                <input name="pass" type="password" placeholder="Contrasena...." class="form-control" required>
                            </div>
                        </div>

                    
                        </fieldset>
    `
            }
            
        }
    }



    
</script>

@stop