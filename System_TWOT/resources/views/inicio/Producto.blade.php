@extends('adminlte::page')

@section('title', 'PRODUCTO')


@section('content_header')
    <h1>PRODUCTO</h1>
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
            <h4 class="modal-title">Agregar Producto</h4>
            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">

             
                 <!--//////////////////////////////////////////////////////////////////////////////// -->
            <center>



            <form action="{{url('producto/agregar')}}" method="post">
    {!! csrf_field() !!}
    <label class="form-label">
        NOMBRE DEL PRODUCTO
        <input type='text' name='NOM PRODUCTO' class="form-control" tabindex="1"></input> 
    </label>
    <label class="form-label">
        PROVEEDOR 
        <input type='text' name='PROVEEDOR' class="form-control" tabindex="2"></input> 
    </label>
    <label class="form-label">
        MARCA
        <input type='text' name='MARCA' class="form-control" ></input> 
    </label>
    <label class="form-label">
       GANANCIA
        <input type='text' name='PRECIO' class="form-control"></input> 
    </label>
    <label class="form-label">
       UNIDADES 
        <input type='text' name='UNIDADES' class="form-control"></input> 
    </label>
    <input type='hidden' name='codEmpresa' value="1" class="form-control"></input>
    <a href="/producto" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Registrar </button>
</form>











            </div> <!-- prueba-->

<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</center>

    </div>
    </div>
</div>
</div>





<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->





<table id="ejemplo" class="table table-striped" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>NOMBRE DE PRODUCTO</th>
                <th>PROVEEDOR</th>
                <th>MARCA</th>
                <th>GANANCIA</th>
                <th>UNIDADES</th>
                <th><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dialogo1">Agregar Producto</button></th>
               <!-- <th><a href="fabricante/crear" class="btn btn-success">Insertar fabricante</a></th>-->
                
                
           
            </tr>
        </thead>
        <tbody>
   @foreach($productoArreglo as $producto)
   <tr>
                <td>#{{$producto['COD_PRODUCTO']}}</td>
                <td>{{$producto['NOM_PRODUCTO']}}</td>
                <td>{{$producto['PROVEEDOR']}}</td>
                <td>{{$producto['MARCA']}}</td>
                <td>L.{{$producto['PRECIO']}}</td>
                <td>{{$producto['UNIDADES']}}</td>
                
            
            
       
            <td>
     
            

            <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$producto['COD_PRODUCTO']}}" onclick="editar({{$producto['COD_PRODUCTO']}})">
               Editar
            </button> 
            <!--Ventana Modal para la Alerta de Editar--->
        <div class="modal fade bd-example-modal-sm" name="{{$producto['COD_PRODUCTO']}}" id="modal-editar-{{$producto['COD_PRODUCTO']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Actualizar Producto</h4>
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
        
                <form action="{{url('producto/actualizar')}}" method="post">
                {!! csrf_field() !!}  @method('PUT') 
                <div id="ActualizaConte-{{$producto['COD_PRODUCTO']}}"> <!-- inicio prueba -->
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
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$producto['COD_PRODUCTO']}}">
               Eliminar
            </button> 

            </td>
           


       </tr>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$producto['COD_PRODUCTO']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>
            
            <!-- a href="ventas" class="btn btn-danger">X</a> -->
            
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
           <form action="{{url('producto/eliminarV/'.$producto['COD_PRODUCTO'])}}" method="post">
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

<script>
$(document).ready(function() {
    $('#ejemplo').DataTable({
      "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
              
            

        }


    });
              
} );

</script>


<script>
    const editar = (id) =>{
        var contenid = document.querySelector('#ActualizaConte-'+id)

        //ojo la url no es de la Api es de un controlador que se conecta a la api
        const url= 'http://127.0.0.1:8000/producto/actualizalo/'+ id;
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
        NOMBRE DE PRODUCTO
        <input type='text' name='NOM_PRODUCTO' class="form-control" tabindex="1" value="${valor.NOM_PRODUCTO}"></input> 
    </label>
    <label class="form-label">
        PROVEEDOR
        <input type='text' name='PROVEEDOR' class="form-control" tabindex="2" value="${valor.PROVEEDOR}"></input> 
    </label>
    <label class="form-label">
        MARCA
        <input type='text' name='MARCA' class="form-control" value="${valor.MARCA}"></input> 
    </label>
    <label class="form-label">
        PRECIO
        <input type='text' name='PRECIO' class="form-control" value="${valor.PRECIO}"></input> 
    </label>
    <label class="form-label">
        UNIDADES
        <input type='text' name='UNIDADES' class="form-control" value="${valor.UNIDADES}"></input> 
    </label>
        <input name="producto" type="hidden" value="${valor.COD_PRODUCTO}">
        <input name="codEmpresa" type="hidden" value="${valor.COD_EMPRESA}">
        
           
    `
            }
            
        }
    }
</script>


@stop