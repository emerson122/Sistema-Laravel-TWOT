@extends('adminlte::page')

@section('title', 'DISTRIBUCION PRODUCTO')


@section('content_header')
    <h1>Distribución Producto</h1>
   
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
            <h4 class="modal-title">Registrar Distribución</h4>
            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
          </div>
          
   <!-- cuerpo del diálogo -->
    <div class="modal-body">
    <center> <!--Centrar contenido-->
             
    <!-- Prueba de funcion select  -->
    <label class="form-label">
     Nombre producto:
     <select name="nombre" class="form-control" id="selecionar-entrega" onchange="return buscar();" required>
         <option value="">Selecione un producto</option>
         @foreach($ventasArreglo as $ventas)
         <!-- decirles que aqui en el valor se agrega el id y en la opcion el nombre -->
         <option value="{{$ventas['COD_VENTA']}}">{{$ventas['NOM_PRODUCTO']}}</option>
         @endforeach
     </select>
    <!-- Fin de prueba select -->

    <form action="{{url('distribucionproducto/agregar')}}" method="post">
    {!! csrf_field() !!}
    <label class="form-label">
      Nombre Departamento 
        <input type='text' name='nombreDepart' class="form-control" required></input> 
    </label>
    <label class="form-label">
        Lugar entrega
        <input type='text' name='lugar_entrega' class="form-control" required></input> 
    </label>
    <label class="form-label">
        Nombre Cliente
        <input type='text' name='nombre' class="form-control" required ></input> 
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
<table id="anadistribucion" class="table table-striped" style="width:65%">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nombre Departamento</th>
                <th scope="col">Lugar Entrega </th>
                <th scope="col">Nombre Cliente</th>
                <th><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dialogo1">Realizar una Distribución</button></th>
                <th style="display: none;"></th>
                <th style="display: none;"></th>
                <th style="display: none;"></th>
           </tr>
        </thead>
        <tbody>
   @foreach($distribucionproductoArreglo as $distribucionproducto)
   <tr> 
                <td><span id="cod_dis">#{{$distribucionproducto['cod_departamento']}}</span></td>
                <td style="display: none;">{{$distribucionproducto['COD_PERSONA']}}</td>
                <td style="display: none;">{{$distribucionproducto['COD_PRODUCTO']}}</td>
                <td style="display: none;">{{$distribucionproducto['COD_VENTA']}}</td>
                <td>{{$distribucionproducto['nombreDepart']}}</td>
                <td>{{$distribucionproducto['lugar_entrega']}}</td>
                <td>{{$distribucionproducto['nombre']}}</td>

                <td>
                 <!--Codigo que comienza boton editar-->
                 <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$distribucionproducto['cod_departamento']}}" onclick="editar({{$distribucionproducto['cod_departamento']}})">
                  Editar
                 </button> 
               
                <!--Ventana Modal para la Alerta de Editar--->
                <div class="modal fade bd-example-modal-sm" name="{{$distribucionproducto['cod_departamento']}}" id="modal-editar-{{$distribucionproducto['cod_departamento']}}">
                <div class="modal-dialog modal-sm">
                <div class="modal-content">

                <!-- cabecera del diálogo -->
                <div class="modal-header">
                  <h4 class="modal-title">Actualizar Registro</h4>
                </div>

<!--TERMINA EL GET--->


           <!-- cuerpo del diálogo METODO PUT -->
             <!--INICIO DEL PUT(actualizar)-->
            <div class="modal-body">
                <form action="{{url('distribucionproducto/actualizardis')}}" method="post">
                {!! csrf_field() !!}  @method('PUT') 
               <label class="form-label">
                Nombre departamento
               <input type='text' name='nombreDepart' class="form-control" value="{{$distribucionproducto['nombreDepart']}}"></input> 
               </label>
               <label class="form-label">
                Lugar entrega
               <input type='text' name='lugar_entrega' class="form-control" value="{{$distribucionproducto['lugar_entrega']}}"></input> 
               </label>
               <label class="form-label">
                Nombre Cliente
               <input type='text' name='nombre' class="form-control" value="{{$distribucionproducto['nombre']}}"></input> 
               </label>
               <input name="distribucionproducto" type="hidden" value="{{$distribucionproducto['cod_departamento']}}">
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
       <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$distribucionproducto['cod_departamento']}}">
         Eliminar
        </button> 
                </td>
  </tr>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$distribucionproducto['cod_departamento']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>
            
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
           <form action="{{url('distribucionproducto/eliminardis/'.$distribucionproducto['cod_departamento'])}}" method="post">
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
  'BIENVENIDO ESTAS EN!',
  'EL MODULO DE DISTRIBUCIÓN',
  'success'
)
  </script>

<script src=https://code.jquery.com/jquery-3.5.1.js></script>
<script src=https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js></script>
<script src=https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js></script>


<script>
$(document).ready(function() {
    $('#anadistribucion').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"

        }


    });
              
} );

</script>


@stop