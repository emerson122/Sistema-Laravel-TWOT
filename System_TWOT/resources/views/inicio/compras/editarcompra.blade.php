@extends('adminlte::page')

@section('title', 'Editar')


@section('content_header')
    <h1>TWOT</h1>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@stop

@section('content')

<h1>Editar Compra</h1>
@foreach($comprasArreglo as $compras) 
<form action="{{url('compras/actualizarC')}}" method="post">
  
{!! csrf_field() !!}
 @method('PUT') 
<label for="">Nombre de producto</label>
<select name="lista1" id="lista1">
    <option value="0">Clavos</option>
    <option value="{{$compras['COD_COMPRA']}}">Martillo</option>
    <option value="2">Cerrucho</option>
    <option value="3">Barrillas</option>
    <option value="4">Pintura</option>
</select>
<br>
<div id="select2"></div>
    <label  class="form-label">
        <!-- Cod Empresa-->
        <input type='hidden' name='empresa' class="form-control" tabindex="1" value="{{$compras['COD_EMPRESA']}}"></input> 
    </label>
    <label type='hidden' class="form-label">
        <!-- COD PERSONA-->
        <input type='hidden' name='persona' class="form-control" tabindex="2" value="{{$compras['COD_PERSONA']}}"></input> 
    </label>
    <label class="form-label">
       Nombre de Producto
        <input type='text' name='productos' class="form-control" value="{{$compras['NOM_PROD']}}" ></input> <!--pattern="[a-z]" -->
    </label>
    <label class="form-label">
       Destino Producto
        <input type='text' name='destino' class="form-control" value="{{$compras['DEST_PROD']}}"></input> 
    </label>
  
    <label class="form-label">
        CATEGORIA
        <input type='text' name='categoria' class="form-control" value="{{$compras['DEST_CATEG']}}"></input> <!--pattern="[0-9]*" -->
    </label>
    <br>
    <label class="form-label">
        Cantidad
        <input type='text' name='cantidad' formmethod="post" class="form-control" value="{{$compras['CANT_PROD']}}"></input> <!-- pattern="[A-Za-z]"-->
    </label>
    <label class="form-label">
        Precio
        <input type='number' name='precio' class="form-control" value="{{$compras['PREC_COMP']}}"></input> 
    </label>
    <label class="form-label">
        Impuesto
        <input type='number' name='impuesto' class="form-control" value="{{$compras['IMPU_COMP']}}"></input> <!--pattern="[0-9]*" -->
    </label>
    <br>
    <label class="form-label">
        Total
        <input type='number' name='total' class="form-control" value="{{$compras['TOL_COMP']}}"></input> <!--pattern="[0-9]*" -->
    </label>
    <input name="compra" type="hidden" value="{{$compras['COD_COMPRA']}}">
    <a href="/ventas" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success">Actualizar </button>
</form>
@endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script>
      Swal.fire(
  'COMENZAMOS!',
  'bienvenidos',
  'success'
)
  </script>
  <script type="text/javascript">
      $(document).ready(function(){
           recargarLista();

          $('#lista1').change(function(){
            recargarLista();
          })
      })

  </script>
  <script type="text/javascript">
      function recargarLista(){
          $.ajax({
              type:"POST",
              url:"actualizalo/",
              data:"NOM_PROD"+ $('#lista1').val(),
              success:function(r){
                $('#select2').html(r);
              }
          });
      }
  </script>
@stop