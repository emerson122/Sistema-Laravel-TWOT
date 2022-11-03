@extends('adminlte::page')

@section('title', 'DESCRIPCION PRODUCTO')


@section('content_header')
    <h1>Descripción Producto</h1>
@stop

@section('content')

<!--INICIA EL POST-->

<!--Inicio del modelo de realizar venta-->
<div class="modal-container">
        <div class="modal fade bd-example-modal-lg" id="dialogo1">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <!-- cabecera del diálogo -->
        <div class="modal-header">
        <h4 class="modal-title">Registrar Descripción</h4>
        </div>
          
   <!-- cuerpo del diálogo -->
    <div class="modal-body">
    <center> <!--Centrar contenido-->

<!-- Prueba de funcion select  -->
     
<label class="form-label">
     Marca producto:
     <select name="nombreproduct" class="form-control" id="selecionar-producto" onchange="return buscar();" required>
         <option value="">Selecione un producto</option>
         @foreach($inventarioArreglo as $inventario)
         <!-- decirles que aqui en el valor se agrega el id y en la opcion el nombre -->
         <option value="{{$inventario['COD_INV']}}">{{$inventario['MARCA']}}</option>
         @endforeach
     </select>
    <!-- Fin de prueba select -->

    <form action="{{url('descripcionproducto/agregar')}}" method="post">
    {!! csrf_field() !!}
    <label class="form-label">
        Nombre producto
        <input type='text' name='nombreproduct' class="form-control" tabindex="2" required></input>  
    </label>
    <label class="form-label">
        Precio 
        <input type='number' name='precioproduct' class="form-control" required></input> 
    </label>
    <br>
    <label class="form-label">
        Cantidad 
        <input type='number' name='cantidadproduct' class="form-control" required></input> 
    </label>
    <label class="form-label">
        Color
        <input type='text' name='color' class="form-control" required ></input> 
    </label>
    <label class="form-label">
        Tamaño
        <input type='text' name='tamano' class="form-control" required ></input> 
    </label>
    <div class="modal-footer"></div>
    <button type="submit" class="btn btn-primary" onclick="CapacityChart();">Registrar </button>
</form>
</div> <!-- prueba-->
<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</center>

    </div>
    </div>
</div>
</div>

<!--TERMINA EL POST-->

<!--INICIO DEL GET--->
<!--Colocacion de tabla creacion distribucion--->
<table id="ejemplo" class="table table-striped" style="width:65%">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <!--<th scope="col">Cod.Descripción</th>
                <th scope="col">Cod. Producto</th>-->
                <th scope="col">Nombre Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
		        <th scope="col">Color</th>
                <th scope="col">Tamaño</th>
                <th><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dialogo1">Realizar descripción</button></th>
                 <th style="display: none;"></th>

            </tr>
        </thead>
        <tbody>
   @foreach($descripcionproductoArreglo as $descripcionproducto)
   <tr>
                <td><span id="cod_dis">#{{$descripcionproducto['cod_descproducto']}}</span></td>
                <td style="display: none;">{{$descripcionproducto['COD_PRODUCTO']}}</td>
                <td>{{$descripcionproducto['nombreproduct']}}</td>
                <td>{{$descripcionproducto['precioproduct']}}</td>
                <td>{{$descripcionproducto['cantidadproduct']}}</td>
                <td>{{$descripcionproducto['color']}}</td>
                <td>{{$descripcionproducto['tamano']}}</td>
                <td>
                <!--Codigo que comienza boton editar-->
                <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$descripcionproducto['cod_descproducto']}}" onclick="editar({{$descripcionproducto['cod_descproducto']}})">
                  Editar
                 </button> 
               
                <!--Ventana Modal para la Alerta de Editar--->
                <div class="modal fade bd-example-modal-sm" name="{{$descripcionproducto['cod_descproducto']}}" id="modal-editar-{{$descripcionproducto['cod_descproducto']}}">
                <div class="modal-dialog modal-sm">
                <div class="modal-content">

                <!-- cabecera del diálogo -->
                <div class="modal-header">
                  <h4 class="modal-title">Actualizar Registro</h4>
                </div>

             <!--TERMINA EL GET--->


             <!-- cuerpo del diálogo METODO PUT -->
             <!--INICIO DEL PUT(ctualizar)-->
             <div class="modal-body">
             <form action="{{url('descripcionproducto/actualizardes')}}" method="post">
             {!! csrf_field() !!}  @method('PUT') 
             <label class="form-label">
              Nombre producto
             <input type='text' name='nombreproduct' class="form-control" tabindex="2" value="{{$descripcionproducto['nombreproduct']}}"></input> 
             </label>
             <label class="form-label">
              Precio producto
             <input type='number' name='precioproduct' class="form-control"value="{{$descripcionproducto['precioproduct']}}" ></input> 
             </label>
             <label class="form-label">
              Cantidad 
             <input type='number' name='cantidadproduct' class="form-control" value="{{$descripcionproducto['cantidadproduct']}}"></input> 
             </label>
             <label class="form-label">
              Color
             <input type='text' name='color' class="form-control"value="{{$descripcionproducto['color']}}" ></input> 
             </label>
             <label class="form-label">
              Tamaño
              <input type='text' name='tamano' class="form-control" value="{{$descripcionproducto['tamano']}}"></input> 
             </label>
             <input name="descripcionproducto" type="hidden" value="{{$descripcionproducto['cod_descproducto']}}">
             <button type="submit" class="btn btn-success">Actualizar </button>
             </form> 
           
           </div>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
<!-- fin de modal para actualizar dato -->

         <!--INICIO DE METODO DELETE-->
<!-- Metodo de Eliminacion con modal-->              
       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$descripcionproducto['cod_descproducto']}}">
         Eliminar
        </button> 
       </td>
       </tr>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$descripcionproducto['cod_descproducto']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>
            
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
           <form action="{{url('descripcionproducto/eliminardes/'.$descripcionproducto['cod_descproducto'])}}" method="post">
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
            "search": "Buscar",
              "lengthMenu": "Mostrar _MENU_ Registros por pagina",
              "info": "Mostrando pagina _PAGE_ de _PAGES_",   
              "processing": "Procesando...",
              "lengthMenu": "Mostrar _MENU_ registros",
              "zeroRecords": "No se encontraron resultados",
              "emptyTable": "Ningún dato disponible en esta tabla",
              "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
              "infoFiltered": "(filtrado de un total de _MAX_ registros)",
              "search": "Buscar:",
              "infoThousands": ",",
              "loadingRecords": "Cargando...",
       "paginate": {
              "previous": "Anterior",
              "next": "siguiente",
              "first": "Primero",
              "last": "Ultimo"

        }

        }


    });
              
} );

</script>


@stop