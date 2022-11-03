@extends('adminlte::page')

@section('title', 'ENPRODUCCION')


@section('content_header')
    <h1>PRODUCCION</h1>
 

@stop

@section('content')


<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->
<div class="modal-container">


        
        <div class="modal fade bd-example-modal-lg" id="dialogo1">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Registrar Produccion</h4>
            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">

             
                 <!--//////////////////////////////////////////////////////////////////////////////// -->
            <center>



            <label class="form-label">
     SELECCIONE PRODUCTO
     <select name="nombre" class="form-control" id="selecionar-producto" onchange="return buscar();" required>
         <option value="">SELECCIONE AQUI</option>
         @foreach($fabricanteArreglo as $fabricante)
         <!-- decirles que aqui en el valor se agrega el id y en la opcion el nombre -->
         <option value="{{$fabricante['COD_EMPRESA']}}">{{$fabricante['PROVEEDORES']}}</option>
         @endforeach
     </select>
            </label>
 <!-- Fin de prueba select -->


            <form action="{{url('enproduccion/agregar')}}" method="post">
    {!! csrf_field() !!}
    <label class="form-label">
        <!--COD EMPRESA-->
        <input type='hidden' name='COD EMPRESA' class="form-control" tabindex="1" required></input> 
    </label>


    <!--<div id="contenido"> 
    

    </div>-->

    <label class="form-label">
        NOMBRE
        <input type='text' name='NOM PROD EN' class="form-control" tabindex="2" required></input> 
    </label>
    <label class="form-label">
        CANTIDAD PRODUCTO
        <input type='number' name='CAN PRODUCTO' class="form-control" required></input> 
    </label>
    <label class="form-label">
    COSTO  
        <input type='number' name='COS PROD EN' class="form-control" required></input> 
    </label>
    <a href="/enproduccion" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Registrar </button>
</form>



            </div> <!-- prueba-->

<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</center>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->

    </div>
    </div>
</div>
</div>




<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->

    <!-- Prueba de funcion select  -->
     
 
    <!-- Fin de prueba select -->


    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------------------------------------------------------------------------->

    


    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------------------------------------------------------------------------->
    





<table id="ejemplo2" class="table table-striped" style="width:64%">
        <thead class="thead-dark">


            <tr>
            
                <th>No </th>
                <!--<th>CODIGO EMPRESA</th>-->
                <th>NOMBRE</th>
                <th>CANTIDAD</th>
                <th>COSTO</th>
               <!-- <th><a href="enproduccion/crear" class="btn btn-success">Insertar enproduccion</a></th>-->
                <th><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dialogo1">Registrar Produccion</button></th>
                <th style="display: none;"></th>
            </tr>
        </thead>
        <tbody>
   @foreach($enproduccionArreglo as $enproduccion)
   <tr>
                <td><span id="COD_ARTICULO">#{{$enproduccion['COD_ARTICULO']}}</span></td>
                <td style="display: none;">{{$enproduccion['COD_EMPRESA']}}</td>
                <td>{{$enproduccion['NOM_PROD_EN']}}</td>
                <td>{{$enproduccion['CAN_PRODUCTO']}}</td>
                <td>{{$enproduccion['COS_PROD_EN']}}</td>
                
      
           <!-- <td>
                <a href="/enproduccion/actualizalo/{{$enproduccion['COD_ARTICULO']}}" class="btn btn-success">Editar</a>
            
                <br></br>

            
                <form action="{{route('eliminar.eliminar',$enproduccion['COD_ARTICULO'])}}" method="post">
                @csrf @method('DELETE')
                <button  class="btn btn-danger">Quitar</button>
                </form>
           </td>-->
    <!--------------------------------------------------------------------------------------------------------------------------->
    <!--------------------------------------------------------------------------------------------------------------------------->

    <td>
        
    
           <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$enproduccion['COD_ARTICULO']}}" onclick="editar({{$enproduccion['COD_ARTICULO']}})">
               Editar
            </button> 
            
            <!--Ventana Modal para la Alerta de Editar--->
        <div class="modal fade bd-example-modal-sm" name="{{$enproduccion['COD_ARTICULO']}}" id="modal-editar-{{$enproduccion['COD_ARTICULO']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Actualizar Registro</h4>
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
        
                <form action="{{url('enproduccion/actualizar')}}" method="post">
                {!! csrf_field() !!}  @method('PUT') 
                <div id="ActualizaConte-{{$enproduccion['COD_ARTICULO']}}"> <!-- inicio prueba -->
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
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$enproduccion['COD_ARTICULO']}}">
               Eliminar
            </button> 

            </td>
           


       </tr>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$enproduccion['COD_ARTICULO']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>
            
            <!-- a href="ventas" class="btn btn-danger">X</a> -->
            
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
           <form action="{{url('enproduccion/eliminarE/'.$enproduccion['COD_ARTICULO'])}}" method="post">
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
   </tbody>
   </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel= https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css>

@stop

@section('js')
  <script>
      Swal.fire(
  'COMENZAMOS!',
  'bienvenidos',
  'success'
)
  </script>

<script src=https://code.jquery.com/jquery-3.5.1.js></script>
<script src=https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js></script>
<script src=https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js></script>

<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->


<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->
<script>
$(document).ready(function() {
    $('#ejemplo2').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"

        }


    });
              
} );

</script>


<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->



<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->

<script>
    //obtener datos para insertar
    function buscar(){
        var opcion = document.getElementById('selecionar-producto').value;
        var contenido = document.querySelector('#contenido')
        //window.location.href = 'http://127.0.0.1:8000/ventas/actualizarP/'+ opcion;

        //obtener datos de la api
        //ojo la url no es de la Api es de un controlador que se conecta a la api
        const url = 'http://127.0.0.1:8000/enproduccion/actualizarP/'+ opcion;
        fetch(url)
        .then(data=>{return data.json()})
        .then(res=>{
            //console.log(res)
            pintar(res);
        })
     
        function pintar(res) {
            //console.log(res)
            contenido.innerHTML = ''
            for(let valor of res){
            contenido.innerHTML += `
            <input type="hidden" name="enproduccion" value="${valor.COD_EMPRESA}">
        
           
            <!--       nombre de producto          -->
            <input type='hidden' id="nombreSel" name='nombre' class="form-control" value="${valor.PROVEEDORES}" required></input>
    
            <label class="form-label">
                Cantidad
            <input type='number' id="num1" name='cantidad' class="form-control" value="${valor.UNIDADES}"  onchange="return operaciones(); " required></input> 
            </label>
            <input type='hidden' id="restarUnidad"  class="form-control" value="${valor.UNIDADES}"  required></input> 
            
            `      
            }
        }
       
    }

</script>
<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->
<script>
    const editar = (id) =>{
        var contenid = document.querySelector('#ActualizaConte-'+id)

        //ojo la url no es de la Api es de un controlador que se conecta a la api
        const url= 'http://127.0.0.1:8000/enproduccion/actualizalo/'+ id;
        fetch(url)
        .then(data=>{return data.json()})
        .then(res=>{
            //console.log(res)
            pintar(res);
        })

        function pintar(res) {
            //console.log(res);
            contenid.innerHTML=""
            for(let valor of res){
                contenid.innerHTML += `
  <label class="form-label">
    <!--COD_EMPRESA-->
        <input type="hidden" name='COD_EMPRESA' class="form-control" tabindex="2" value="${valor.COD_EMPRESA}"></input> 
    </label>
    <label class="form-label">
    NOMBRE
        <input type='text' name='NOM_PROD_EN' class="form-control" tabindex="2" value="${valor.NOM_PROD_EN}"></input> 
    </label>
    <label class="form-label">
    CANTIDAD
        <input type='number' name='CAN_PRODUCTO' class="form-control" value="${valor.CAN_PRODUCTO}"></input> 
    </label>
    <label class="form-label">
    COSTO  
        <input type='number' name='COS_PROD_EN' class="form-control" value="${valor.COS_PROD_EN}" ></input> 
    </label>
    <input type="hidden" name='enproduccion' class="form-control" tabindex="1" value="${valor.COD_ARTICULO}"></input> 
      
    `
            }
            
        }
    }
</script>

<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->


@stop



