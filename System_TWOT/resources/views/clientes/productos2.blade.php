<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>TWOT | PRODUCTOS 2</title>
    <!-- Inicio de codigo javascript -->



    <!-- Fin de codigo javascript-->
  </head>
  <body bgcolor="yellow">
  <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="https://dev.to/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Clientes</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{url('/clientes')}}" class="nav-link align-middle px-0">
                        <i class="fa-brands fa-product-hunt"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Productos</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{url('clientes/productos1')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Productos</span> 1</a>
                            </li>
                            <li>
                                <a href="{{url('clientes/productos2')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Productos</span> 2</a>
                            </li>
                            <li>
                                <a href="{{url('clientes/productos3')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Productos</span> 3</a>
                            </li>
                            <li>
                                <a href="{{url('clientes/productos4')}}" class="nav-link px-0"> <span class="d-none d-sm-inline">Productos</span> 4</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="https://dev.to/codeply/#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="https://dev.to/codeply/#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://api.lorem.space/image/face?w=150&amp;amp;amp;amp;h=220" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Cliente</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{url('/login')}}">cerrar sesion</a></li>
                    </ul>
                </div>
            </div>
        </div>
           <!-- de aqui para abajo es el contenido -->
           <!-- de aqui para abajo es el contenido -->
     
           @foreach($productos1Arreglo as $producto)
            <main>
            <div class="row row-cols-1 row-cols-md-5 g-5 bg-danger"> 
    <div class="col"> 
                <div class="card" style="width: 18rem;">
  <img src="{{$producto[0]['imagen']}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$producto[0]['Nombre']}}</h5>
    <p class="card-text">{{$producto[0]['Descripcion']}}</p>
  </div>
  <!-- Calculo del precio + ganancia-->
  <input type="hidden" value="{{$ganancia = intval($producto[0]['Precio'] + $productoGananciaArreglo[0]['PRECIO'])}}">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Precio</li>
    <li class="list-group-item">{{$ganancia}}</li>
    <li class="list-group-item">Estado</li>
    <li class="list-group-item">Bueno</li>
  </ul>
  <ul>
  <div class="iconos-producto">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        </div>
  </ul>
  </ul>
  <div class="card-body">
      <!-- inicio del modal -->
<div class="modal-container">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#dialogo1">Comprar</button>
    
        <div class="modal fade bd-example-modal-lg" id="dialogo1">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Compra de producto: {{$producto[0]['Nombre']}} </h4>
            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
                 <!--//////////////////////////////////////////////////////////////////////////////// -->
            <center> 

    <form rol="form" action="{{url('ventas/agregar')}}" method="post"> 
            {!! csrf_field() !!}
            <label class="form-label bg-info">
                Producto en venta
                <input type='text' id="nombre" name='nombre' Value="{{$producto[0]['Nombre']}}" class="form-control" readonly></input> 
            </label>    
            
         <label class="form-label bg-info">
        Precio
        <input type='number' id="num2" name='precio' Value="{{$ganancia}}" class="form-control" readonly></input> <!--  pattern="[0-9]*"-->
    </label>
    <br>
    
    @if($inventarioArreglo[0]['UNIDADES'] <= 0)
    <center>
    <label class="form-label bg-danger" ><h1> Producto agotado </h1></label>
    </center>
    @else
    <input type="hidden" name="INV" value="{{$inventarioArreglo[0]['COD_INV']}}">
    <input type="hidden" name="personas" value="1">
     <input type="hidden" name="cod_Producto" value="1">
    <label class="form-label">Unidades disponibles: {{$inventarioArreglo[0]['UNIDADES']}}</label>
    <br>
    <label class="form-label">
                Cantidad 
    <input type='number' id="num1" name='cantidad' min="0" max="{{$inventarioArreglo[0]['UNIDADES']}}" class="form-control"  onchange="return operaciones(); " required></input> 
    </label>
    <br>
    <label class="form-label">
        Sub Total 
        <input type='number' id="TB" name='totalb' class="form-control" readonly ></input> <!--pattern="[0-9]*" -->
    </label>
    <label class="form-label">
        Impuesto
        <input type='number' id="IMP" name='impuesto' class="form-control" value="15" readonly></input> 
    </label>
    <label class="form-label">
        Total
        <input type='number' id="Total" name='total' class="form-control"  readonly></input> <!--pattern="[0-9]*" -->
    </label>
    <div id="destino" class="bg-success" style="display: none;">
    <label class="form-label">
    <FONT COLOR="white"> Destino del envio </font>
        <input type='text' id="Dv" name='destino' class="bg-warning"formmethod="post" value="ingresa tu destino"class="form-control" onchange="return operacionesTotal();"  required></input> <!-- pattern="[A-Za-z]"-->
    </label>
    </div>
    <div class="modal-footer"></div>
    <button type="submit" class="btn btn-primary" onclick="CapacityChart();">Comprar </button>

</form>

<br>
    <b>Deseas que se realice un envio?</b>
    <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
    <div id="content" class="bg-success" style="display: none;"> 
    <!-- inicio de distribucion-->
    <form action="{{url('distribucionproducto/ventadecliente')}}" method="post">
    {!! csrf_field() !!}
    <label class="form-label">
      Nombre Departamento 
        <input type='text' id  name='nombreDepart' class="form-control" required></input> 
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
    <button type="submit" class="btn btn-primary">preparar envio</button>
   </form>
    <!-- Fin de distribucion-->
    </div>
    @endif

    <br>
 


</div> <!-- cierra el body-->

<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</center>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>
    </div>
</div>
</div>


<!-- fin del modal-->
  <!--
    <a  type="button" class="btn btn-success" href="#" class="card-link">Comprar</a>
-->
  
  </div>
</div>
</div>
<div class="col">
<!-- segundo -->
<div class="card" style="width: 18rem;">
  <img src="{{$producto[1]['imagen']}}" class="card-img-top" alt="...">
  <div class="card-body">
<!-- Calculo del precio + ganancia-->
<input type="hidden" value="{{$ganancia2 = intval($producto[1]['Precio'] + $productoGananciaArreglo[1]['PRECIO'])}}">
  
    <h5 class="card-title">{{$producto[1]['Nombre']}}</h5>
    <p class="card-text">{{$producto[1]['Descripcion']}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Precio</li>
    <li class="list-group-item">{{$ganancia2}}</li>
    <li class="list-group-item">Estado</li>
    <li class="list-group-item">Bueno</li>
  </ul>

  <ul>
  <div class="iconos-producto">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        </div>
  </ul>
  <div class="card-body">
      
<!-- comenzaste-->

      <!-- inicio del modal -->
      <div class="modal-container">
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#dialogo2">Comprar</button>
    
        <div class="modal fade bd-example-modal-lg" id="dialogo2">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Compra del producto: {{$producto[1]['Nombre']}}</h4>
            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
                 <!--//////////////////////////////////////////////////////////////////////////////// -->
            <center> 

    <form rol="form" action="{{url('ventas/agregar')}}" method="post"> 
            {!! csrf_field() !!}
            <label class="form-label bg-info">
                Producto en venta
                <input type='text' id="nombre" name='nombre' Value="{{$producto[1]['Nombre']}}" class="form-control" readonly></input> 
            </label>    
            
         <label class="form-label bg-info">
        Precio
        <input type='number' id="numero2" name='precio' Value="{{$ganancia2}}" class="form-control" readonly></input> <!--  pattern="[0-9]*"-->
    </label>
    <br>
    
    @if($inventarioArreglo[1]['UNIDADES'] <= 0)
    <center>
    <label class="form-label bg-danger" ><h1> Producto agotado </h1></label>
    </center>
    @else
    <input type="hidden" name="INV" value="{{$inventarioArreglo[1]['COD_INV']}}">
    <input type="hidden" name="personas" value="1">
     <input type="hidden" name="cod_Producto" value="1">
    <label class="form-label">Unidades disponibles: {{$inventarioArreglo[1]['UNIDADES']}}</label>
    <br>
    <label class="form-label">
                Cantidad 
    <input type='number' id="numero1" name='cantidad' min="0" max="{{$inventarioArreglo[1]['UNIDADES']}}" class="form-control"  onchange="return operaciones2(); " required></input> 
    </label>
    <br>
    <label class="form-label">
        Sub Total 
        <input type='number' id="TB2" name='totalb' class="form-control" readonly ></input> <!--pattern="[0-9]*" -->
    </label>
    <label class="form-label">
        Impuesto
        <input type='number' id="IMP2" name='impuesto' class="form-control" value="15" readonly></input> 
    </label>
    <label class="form-label">
        Total
        <input type='number' id="Total2" name='total' class="form-control"  readonly></input> <!--pattern="[0-9]*" -->
    </label>
    <div id="destino2" class="bg-success" style="display: none;">
    <label class="form-label">
    <FONT COLOR="white"> Destino del envio </font>
        <input type='text' id="Dv" name='destino' class="bg-warning"formmethod="post" value="ingresa tu destino"class="form-control" onchange="return operacionesTotal();"  required></input> <!-- pattern="[A-Za-z]"-->
    </label>
    </div>
    <div class="modal-footer"></div>
    <button type="submit" class="btn btn-primary" onclick="CapacityChart();">Comprar </button>

</form>

<br>
    <b>Deseas que se realice un envio?</b>
    <input type="checkbox" name="check" id="check2" value="1" onchange="javascript:showContent2()" />
    <div id="content2" class="bg-success" style="display: none;"> 
    <!-- inicio de distribucion-->
    <form action="{{url('distribucionproducto/ventadecliente')}}" method="post">
    {!! csrf_field() !!}
    <label class="form-label">
      Nombre Departamento 
        <input type='text' id  name='nombreDepart' class="form-control" required></input> 
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
    <button type="submit" class="btn btn-primary">preparar envio</button>
   </form>
    <!-- Fin de distribucion-->
    </div>
    @endif

    <br>
 


</div> <!-- cierra el body-->

<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</center>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>
    </div>
</div>
</div>







            <!-- terminaste -->
@endforeach
  </div>
</div>
</div>
<div class="container">
    <div class="row">
        <!-- Elementos generados a partir del JSON -->
        <main id="items" class="col-sm-8 row"></main>
        <!-- Carrito -->
        <aside class="col-sm-4">
        <FONT COLOR="white"><h2>Carrito</h2></FONT>
            <!-- Elementos del carrito -->
            <ul id="carrito" class="list-group"></ul>
            <hr>
            <!-- Precio total -->
            <FONT COLOR="white">
            <p class="text-right">Total: <span id="total"></span>&euro;</p>
            </FONT>
            <button id="boton-vaciar" class="btn btn-primary">Vaciar</button>
        </aside>
    </div>
</div>
<!-- TERCERO -->
<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>
<h1></h1>

</div>
           


            </main>
            
              
            </div>
           
        </div>

    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </script>

<script src=https://code.jquery.com/jquery-3.5.1.js></script>
<script src=https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js></script>
<script src=https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function operaciones(){
        var cantidad = parseInt(document.getElementById('num1').value);
        var precio  = parseInt(document.getElementById('num2').value);
        
        var resul = precio * cantidad;

        document.getElementById('TB').value = resul;


        //llenar lo otro

        var impuesto=parseInt(document.getElementById('IMP').value);
        var cantidad=parseInt(document.getElementById('num1').value);
        var Total =parseInt(document.getElementById('TB').value);
        var divido = impuesto/100;
        var multiplicacion = Total * divido;
        var resul = multiplicacion + Total;

        document.getElementById('Total').value = resul;

    }
</script>

<script>
    function operaciones2(){
        var cantidad = parseInt(document.getElementById('numero1').value);
        var precio  = parseInt(document.getElementById('numero2').value);
        
        var resul = precio * cantidad;

        document.getElementById('TB2').value = resul;


        //llenar lo otro

        var impuesto=parseInt(document.getElementById('IMP2').value);
        var cantidad=parseInt(document.getElementById('numero1').value);
        var Total =parseInt(document.getElementById('TB2').value);
        var divido = impuesto/100;
        var multiplicacion = Total * divido;
        var resul = multiplicacion + Total;

        document.getElementById('Total2').value = resul;

    }
</script>

<script>
    //sub total
    function operacionesTotal(){
        var impuesto=parseInt(document.getElementById('IMP').value);
        var cantidad=parseInt(document.getElementById('num1').value);
        var Total =parseInt(document.getElementById('TB').value);
        var divido = impuesto/100;
        var multiplicacion = Total * divido;
        var resul = multiplicacion + Total;

        document.getElementById('Total').value = resul;
    }
</script>


  
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        destino = document.getElementById("destino");

        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
            destino.style.display='block';
            
        }
        else {
            element.style.display='none';
            destino.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showContent2() {
        element = document.getElementById("content2");
        destino = document.getElementById("destino2");

        check = document.getElementById("check2");
        if (check.checked) {
            element.style.display='block';
            destino.style.display='block';
            
        }
        else {
            element.style.display='none';
            destino.style.display='none';
        }
    }
</script>






  </body>
</html>