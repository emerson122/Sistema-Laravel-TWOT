@extends('adminlte::page')

@section('title', 'Inicio')


@section('content_header')
<h1>TWOT</h1>
@stop

@section('content')
<table cellspacing="10" cellpadding="10" class="Table table-responsive table-dark table-striped mt-1" style="border:2px solid cyan;">
  <thead>
    <th>
      @foreach($conteoArreglo as $conteo)
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$conteo['PRODUCTOS']}}</h3>
          <p>Productos Registrados</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="{{url('producto')}}" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </th>

    <th>
      <div class="small-box bg-gradient-success">
        <div class="inner">
          <h3>{{$conteo['PERSONAS']}}</h3>
          <p>Usuarios Registrados</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-plus"></i>
        </div>
        <a href="{{url('personas/users')}}" class="small-box-footer">
          Mas informacion <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </th>
    <th>
      <div class="small-box bg-gradient-danger">
        <div class="inner">
          <h3>{{$conteo['PROVEEDORES']}}</h3>
          <p>Fabricantes Registrados</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-truck"></i>
        </div>
        <a href="{{url('fabricante')}}" class="small-box-footer">
          Mas informacion <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </th>

    <th>
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{$conteo['VENTAS']}}</h3>
          <p>VENTAS REGISTRADAS</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="{{url('ventas')}}" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </th>
    <th>
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$conteo['COMPRAS']}}</h3>
          <p>COMPRAS REGISTRADAS</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="{{url('compras')}}" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </th>
    <th>
      <!-- INGRESOS Y EGRESOS CONTABLES -->
      @foreach($contaArreglo as $conta)
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$conta['INGRESOS']}}</h3>
          <p>CAPITAL DE INGRESOS</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="{{url('ventas')}}" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </th>

    <th>
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$conta['EGRESOS']}}</h3>
          <p>CAPITAL DE EGRESOS</p>
        </div>
        <div class="icon">
          <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="{{url('compras')}}" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </th>
    @endforeach
    <th>
      <div class="small-box bg-gradient-success">
        <div class="inner">
          <p>Registrar Usuario</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-plus"></i>
        </div>
        <a id="btn_custom" class="small-box-footer">
          Mas informacion <i class="fas fa-arrow-circle-right"></i>
        </a>
      </div>
    </th>

    @endforeach
  </thead>
</table>

<div id="modal_custom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('personas/registrar')}}" class="form-horizontal" method="post">
          {!! csrf_field() !!}
          <fieldset>
            <legend class="text-center header">Registrar Usuario</legend>
            <div class="form-group">
              <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
              <label for="">Nombre</label>
              <div class="col-md-8">
                <input id="fname" name="name" type="text" placeholder="Nombre" class="form-control" required>
              </div>
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
                    <input name="edad" type="number" placeholder="Edad" class="form-control" required>
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
                      <input name="identidad" type="text" placeholder="Indentidad" class="form-control" required>
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
                          <input id="l" name="indPersonas" type="hidden" value='1' class="form-control">
                        </div>
                        <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                          <div class="col-md-8">
                            <label for="">Email</label>
                            <input name="CodemailP" type="hidden" VALUE="1" class="form-control">
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

                        <div class="form-group">
                          <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                          </div>
                        </div>
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">


      </div>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>

<center><img class="two-columns" src="vendor/adminlte/dist/img/banner.jpg" width="1320" height="800"></center>

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

<script>
  $("#btn_custom").click(function() {
    $("#modal_custom").find(".modal-header").css("background", "linear-gradient(90deg, rgba(2,0,36,1) 11%, rgba(6,6,48,1) 53%, rgba(0,212,255,1) 100%)");
    $("#modal_custom").find(".modal-header").css("color", "white");
    $("#modal_custom").find(".modal-title").text("Registrar un usuario");
    $('#modal_custom').modal('show');
  });
</script>
@stop