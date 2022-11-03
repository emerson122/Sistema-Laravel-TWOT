@extends('adminlte::page')

@section('title', 'INVENTARIO')


@section('content_header')
<h1>INVENTARIO</h1>
@stop

@section('content')

<div class="modal-container">

    <div class="modal fade bd-example-modal-lg" id="dialogo1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- cabecera del diálogo -->
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Inventario</h4>
                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                </div>

                <!-- cuerpo del diálogo -->
                <div class="modal-body">


                    <!--//////////////////////////////////////////////////////////////////////////////// -->
                    <center>
                        <form action="{{url('inventario/agregar')}}" method="post">
                            {!! csrf_field() !!}
                            <input type='hidden' name='codprod' class="form-control" value="1" tabindex="1"></input>
                            <input type='hidden' name='codemp' class="form-control" value="1" tabindex="1"></input>

                            <label class="form-label">
                                NOMBRE DEL PRODUCTO
                                <input type='text' name='NOM PRODUCTOS' class="form-control" tabindex="1"></input>
                            </label>
                            <label class="form-label">
                                PROVEEDORES
                                <input type='text' name='PROVEEDORES' class="form-control" tabindex="2"></input>
                            </label>
                            <label class="form-label">
                                MARCA
                                <input type='text' name='MARCA' class="form-control"></input>
                            </label>
                            <label class="form-label">
                                UNIDADES
                                <input type='number' name='UNIDADES' class="form-control"></input>
                            </label>
                            <label class="form-label">
                                CATEGORIAS
                                <input type='text' name='CATEGORIAS' class="form-control"></input>
                            </label>
                            <a href="/inventario" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrar </button>
                        </form>


                </div> <!-- prueba-->

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </center>

            </div>
        </div>
    </div>
</div>
<br>
<br>

<h1 class="text-warning">
    Se necesita autorizacion
</h1>
    <br>
<h1>Las unidades de inventario son una parte sensible del sistema y se necesita se autorizacion</h1>
<a class="btn btn-success" href="#ejemplo">
Autorizar
</a>
<br>

<table id="ejemplo" class="table table-striped" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>NOMBRE DE PRODUCTO</th>
            <th>PROVEEDORES</th>
            <th>MARCA</th>
            <th>UNIDADES</th>
            <th>CATEGORIAS</th>
            <th><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dialogo1">Agregar Inventario</button></th>


        </tr>
    </thead>
    <tbody>
        @foreach($inventarioArreglo as $inventario)
        <tr>
            <td>#{{$inventario['COD_INV']}}</td>
            <td>{{$inventario['NOM_PRODUCTOS']}}</td>
            <td>{{$inventario['PROVEEDORES']}}</td>
            <td>{{$inventario['MARCA']}}</td>
            <td>{{$inventario['UNIDADES']}}</td>
            <td>{{$inventario['CATEGORIAS']}}</td>




            <br></br>


            <td>

                <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$inventario['COD_INV']}}" onclick="editar({{$inventario['COD_INV']}})">
                    Editar
                </button>
                <!--Ventana Modal para la Alerta de Editar--->
                <div class="modal fade bd-example-modal-sm" name="{{$inventario['COD_INV']}}" id="modal-editar-{{$inventario['COD_INV']}}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <!-- cabecera del diálogo -->
                            <div class="modal-header">
                                <h4 class="modal-title">Actualizar Inventario</h4>
                            </div>

                            <!-- cuerpo del diálogo -->
                            <div class="modal-body">

                                <form action="{{url('inventario/actualizar')}}" method="post">
                                    {!! csrf_field() !!} @method('PUT')
                                    <div id="ActualizaConte-{{$inventario['COD_INV']}}">
                                        <!-- inicio prueba -->
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
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$inventario['COD_INV']}}">
                    Eliminar
                </button>

            </td>



        </tr>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$inventario['COD_INV']}}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- cabecera del diálogo -->
                    <div class="modal-header">
                        <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>


                    </div>

                    <!-- cuerpo del diálogo -->
                    <div class="modal-body">
                        <form action="{{url('inventario/eliminarV/'.$inventario['COD_INV'])}}" method="post">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger">Eliminar</button>

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
<link rel=https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css>

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

    });
</script>


<script>
    const editar = (id) => {
        var contenid = document.querySelector('#ActualizaConte-' + id)

        //ojo la url no es de la Api es de un controlador que se conecta a la api
        const url = 'http://127.0.0.1:8000/inventario/actualizalo/' + id;
        fetch(url)
            .then(data => {
                return data.json()
            })
            .then(res => {
                //console.log(res)
                pintar(res);
            })

        function pintar(res) {
            //console.log(res);
            contenid.innerHTML = ""
            for (let valor of res) {
                contenid.innerHTML += `
                
    <input type='hidden' name='codprod' class="form-control" value="1" tabindex="1"></input> 
    <input type='hidden' name='codemp' class="form-control" value="1" tabindex="1"></input> 
                <label class="form-label">
        NOMBRE DE PRODUCTO
        <input type='text' name='NOM PRODUCTOS' class="form-control" tabindex="1" value="${valor.NOM_PRODUCTOS}"></input> 
    </label>
    <label class="form-label">
        PROVEEDORES
        <input type='text' name='PROVEEDORES' class="form-control" tabindex="2" value="${valor.PROVEEDORES}"></input> 
    </label>
    <label class="form-label">
        MARCA
        <input type='text' name='MARCA' class="form-control" value="${valor.MARCA}"></input> 
    </label>
    <label class="form-label">
        UNIDADES
        <input type='number' name='UNIDADES' class="form-control" value="${valor.UNIDADES}"></input> 
    </label>
    <label class="form-label">
        CATEGORIAS
        <input type='text' name='CATEGORIAS' class="form-control" value="${valor.CATEGORIAS}"></input> 
    </label>
        <input name="inventario" type="hidden" value="${valor.COD_INV}">
           
    `
            }

        }
    }
</script>


@stop