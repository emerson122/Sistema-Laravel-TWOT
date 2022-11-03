@extends('layouts.plantilla')

@section('title', 'Realizar')


@section('contenido')
<h1>Registrar Compras</h1>
<form action="{{url('compras/agregarC')}}" method="post"> 
{!! csrf_field() !!}
    <label class="form-label">
    COD_EMPRESA
        <input type='number' name='empresa' class="form-control" tabindex="1"></input> 
    </label>
    <label class="form-label">
    COD_PERSONA
        <input type='number' name='persona' class="form-control" tabindex="2"></input> 
    </label>
    <label class="form-label">
    Nombre de Producto
        <input type='number' name='producto' class="form-control" ></input> 
    </label>
    <br>
    <label class="form-label">
    Destino
        <input type='text' name='destino' class="form-control" ></input> <!--pattern="[a-z]" -->
    </label>
    <label class="form-label">
   CATEGORIA
        <input type='text' name='categoria' class="form-control"></input> 
    </label>
    <label class="form-label">
    Cantidad
        <input type='text' name='cantidad' class="form-control"></input> <!--  pattern="[0-9]*"-->
    </label>
    <br>
    <label class="form-label">
    Precio
        <input type='text' name='precio' class="form-control"></input> <!--  pattern="[0-9]*"-->
    </label>
    <label class="form-label">
    Impuesto
        <input type='text' name='impuesto' class="form-control"></input> <!--  pattern="[0-9]*"-->
    </label>
    <label class="form-label">
    Total
        <input type='text' name='total' class="form-control"></input> <!--  pattern="[0-9]*"-->
    </label>
    <br>
    
    <a href="/compras" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Realizar </button>
</form>


@endsection