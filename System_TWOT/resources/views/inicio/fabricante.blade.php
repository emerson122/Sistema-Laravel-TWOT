@extends('adminlte::page')

@section('title', 'FABRICANTE')


@section('content_header')
<h1>FABRICANTE</h1>
@stop

@section('content')

<!--------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------->
<div class="modal-container">



<!-- modal del insertar  -->
    <div class="modal fade bd-example-modal-lg" id="dialogo1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- cabecera del diálogo -->
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Fabricante</h4>
                    <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
                </div>

                <!-- cuerpo del diálogo -->
                <div class="modal-body">


                    <!--//////////////////////////////////////////////////////////////////////////////// -->
                    <center>



                        <form action="{{url('fabricante/agregar')}}" method="post">
                            {!! csrf_field() !!}
                            <label class="form-label">
                                PROVEEDORES
                                <input type='text' name='PROVEEDORES' class="form-control" required tabindex="1"></input>
                            </label>
                            <label class="form-label">
                                DIRECCION
                                <input type='text' name='DIR EMPRESA' class="form-control" required tabindex="2"></input>
                            </label>
                            <label class="form-label">
                                TELEFONO
                                <input type='number' name='TEL EMPRESA' class="form-control" required></input>
                            </label>
                            <label class="form-label">
                                CORREO
                                <input type='text' name='COR EMPRESA' class="form-control" required></input>
                            </label>
                            <label class="form-label">
                                NOMBRE DE PRODUCTO
                                <input type='text' name='NOM PRODUCTO' class="form-control" required></input>
                            </label>
                            <label class="form-label">
                                UNIDADES
                                <input type='number' name='UNIDADES' class="form-control" required></input>
                            </label>
                            <label class="form-label">
                                COSTO DE PRODUCTO
                                <input type='number' name='COS PRODUCTO' class="form-control" required></input>
                            </label>
                            <a href="/fabricante" class="btn btn-secondary">Cancelar</a>
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





<table id="ejemplo" class="table table-striped" style="width:30%">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>PROVEEDORES</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>CORREO</th>
            <th>NOMBRE DE PRODUCTO</th>
            <th>UNIDADES</th>
            <th>COSTO DE PRODUCTO</th>
            <th><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dialogo1">Agregar Fabricante</button></th>
            <!-- <th><a href="fabricante/crear" class="btn btn-success">Insertar fabricante</a></th>-->



        </tr>
    </thead>
    <tbody>
        @foreach($fabricanteArreglo as $fabricante)
        <tr>
            <td>#{{$fabricante['COD_EMPRESA']}}</td>
            <td>{{$fabricante['PROVEEDORES']}}</td>
            <td>{{$fabricante['DIR_EMPRESA']}}</td>
            <td>{{$fabricante['TEL_EMPRESA']}}</td>
            <td>{{$fabricante['COR_EMPRESA']}}</td>
            <td>{{$fabricante['NOM_PRODUCTO']}}</td>
            <td>{{$fabricante['UNIDADES']}}</td>
            <td>{{$fabricante['COS_PRODUCTO']}}</td>


            <!-- <td>
                 <a href="/fabricante/actualizalo/{{$fabricante['COD_EMPRESA']}}" class="btn btn-success">Editar</a>
               
    
<br></br>
               
                <form action="{{route('eliminarf.eliminarf',$fabricante['COD_EMPRESA'])}}" method="post">       
                 @csrf @method('DELETE')
                 <button  class="btn btn-danger">Quitar</button>
                </form>-->
            <td>



                <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$fabricante['COD_EMPRESA']}}" onclick="editar({{$fabricante['COD_EMPRESA']}})">
                    Editar
                </button>
                <!--Ventana Modal para la Alerta de Editar--->
                <div class="modal fade bd-example-modal-sm" name="{{$fabricante['COD_EMPRESA']}}" id="modal-editar-{{$fabricante['COD_EMPRESA']}}">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <!-- cabecera del diálogo -->
                            <div class="modal-header">
                                <h4 class="modal-title">Actualizar Registro</h4>
                            </div>

                            <!-- cuerpo del diálogo -->
                            <div class="modal-body">

                                <form action="{{url('fabricante/actualizar')}}" method="post">
                                    {!! csrf_field() !!} @method('PUT')
                                    <div id="ActualizaConte-{{$fabricante['COD_EMPRESA']}}">
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
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$fabricante['COD_EMPRESA']}}">
                    Eliminar
                </button>

            </td>



        </tr>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$fabricante['COD_EMPRESA']}}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <!-- cabecera del diálogo -->
                    <div class="modal-header">
                        <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>

                        <!-- a href="ventas" class="btn btn-danger">X</a> -->

                    </div>

                    <!-- cuerpo del diálogo -->
                    <div class="modal-body">
                        <form action="{{url('fabricante/eliminarF/'.$fabricante['COD_EMPRESA'])}}" method="post">
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
        const url = 'http://127.0.0.1:8000/fabricante/actualizalo/' + id;
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
                <label class="form-label">
        PROVEEDORES
        <input type='text' name='PROVEEDORES' class="form-control" tabindex="1" value="${valor.PROVEEDORES}"></input> 
    </label>
    <label class="form-label">
        DIRECCION
        <input type='text' name='DIR EMPRESA' class="form-control" tabindex="2" value="${valor.DIR_EMPRESA}"></input> 
    </label>
    <label class="form-label">
        TELEFONO
        <input type='number' name='TEL EMPRESA' class="form-control" value="${valor.TEL_EMPRESA}"></input> 
    </label>
    <label class="form-label">
        CORREO
        <input type='text' name='COR EMPRESA' class="form-control" value="${valor.COR_EMPRESA}"></input> 
    </label>
    <label class="form-label">
        NOMBRE DE PRODUCTO
        <input type='text' name='NOM PRODUCTO' class="form-control" value="${valor.NOM_PRODUCTO}"></input> 
    </label>
    <label class="form-label">
        UNIDADES
        <input type='number' name='UNIDADES' class="form-control" value="${valor.UNIDADES}"></input> 
    </label>
    <label class="form-label">
        COSTO DE PRODUCTO
        <input type='number' name='COS PRODUCTO' class="form-control" value="${valor.COS_PRODUCTO}"></input> 
        </label>
        <input name="fabricante" type="hidden" value="${valor.COD_EMPRESA}">
           
    `
            }

        }
    }
</script>


@stop