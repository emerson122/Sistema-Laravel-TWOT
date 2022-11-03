@extends('adminlte::page')

@section('title', 'Ventas')


@section('content_header')
    <h1>VENTAS</h1>
@stop

@section('content')



    <div class="modal-container">
        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dialogo1">Realizar una venta</button>
    
        <div class="modal fade bd-example-modal-lg" id="dialogo1">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Registrar Venta</h4>
            <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
                 <!--//////////////////////////////////////////////////////////////////////////////// -->
            <center>
             
    <!-- Prueba de funcion select  -->
     
     <label class="form-label">
     Producto:
     <select name="nombre" class="form-control" id="selecionar-producto" onchange="return buscar();" required>
         <option value="">Selecione un producto</option>
         @foreach($inventarioArreglo as $inventario)
         <!-- decirles que aqui en el valor se agrega el id y en la opcion el nombre -->
         <option value="{{$inventario['COD_INV']}}">{{$inventario['NOM_PRODUCTOS']}}</option>
         @endforeach
     </select>
    <!-- Fin de prueba select -->


    <form rol="form" action="{{url('ventas/agregar')}}" method="post"> 
            {!! csrf_field() !!}
         <label class="form-label">
        Precio
        <input type='number' id="num2" name='precio' class="form-control" required></input> <!--  pattern="[0-9]*"-->
    </label>
    <!-- inicio prueba -->
    <div id="contenido"> 
    
    </div>
    
    <br>
    <label class="form-label">
        Sub Total 
        <input type='number' id="TB" name='totalb' class="form-control" required ></input> <!--pattern="[0-9]*" -->
    </label>
    <label class="form-label">
        Destino de venta
        <input type='text' id="Dv" name='destino' formmethod="post" class="form-control"  required></input> <!-- pattern="[A-Za-z]"-->
    </label>
    <label class="form-label">
        Impuesto
        <input type='number' id="IMP" name='impuesto' class="form-control" onchange="return operacionesTotal();" required></input> 
    </label>
    <br>
    <label class="form-label">
        Total
        <input type='number' id="Total" name='total' class="form-control"  required></input> <!--pattern="[0-9]*" -->
    </label>
    <div class="modal-footer"></div>
    <button type="submit" class="btn btn-primary" onclick="CapacityChart();">Registrar </button>
</form>
</div> <!-- prueba-->

<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</center>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </div>
    </div>
</div>
</div>


<table id="ejemplo" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Productos</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Sub Total</th>
            <th scope="col">DESTINO</th>
            <th scope="col">FECHA</th>
            <th scope="col">Impuesto</th>
            <th scope="col">TOTAL</th>
            <th scope="col">ACCIONES</th>
        </tr>
</thead>
<tbody>
    @foreach($ventasArreglo as $ventas) 
    <tr>
    
    <td><span id="cod_v">#{{$ventas['COD_VENTA']}}</span></td>
      <td style="display: none;">{{$ventas['COD_INV']}}</td>
      <td style="display: none;">{{$ventas['COD_PERSONA']}}</td>
      <td style="display: none;">{{$ventas['COD_PRODUCTO']}}</td>
       <td>{{$ventas['NOM_PRODUCTO']}}</td>
       <td>{{$ventas['CANT_PRODUCTO']}}</td>
       <td>${{$ventas['PREC_UNITARIO']}}</td>
       <td>{{$ventas['TOTAL_BRUTO']}}</td>
       <td>{{$ventas['DESTINO_VENTA']}}</td>
       <td>{{substr($ventas['FEC_VENTA'],0,10)}}</td>
       <td>{{$ventas['IMPUE_TOTAL']}}.00</td>
       <td>{{$ventas['TOTAL_VENTA']}}.00</td>
     
       <td>
           <!-- a href="/ventas/actualizalo/{{$ventas['COD_VENTA']}}" class="btn btn-success">Editar</a>  -->
           
           <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$ventas['COD_VENTA']}}" onclick="editar({{$ventas['COD_VENTA']}})">
               Editar
            </button> 
            <!--Ventana Modal para la Alerta de Editar--->
        <div class="modal fade bd-example-modal-sm" name="{{$ventas['COD_VENTA']}}" id="modal-editar-{{$ventas['COD_VENTA']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Actualizar Registro</h4>
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
        
                <form action="{{url('ventas/actualizar')}}" method="post">
                {!! csrf_field() !!}  @method('PUT') 
                <div id="ActualizaConte-{{$ventas['COD_VENTA']}}"> <!-- inicio prueba -->
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
           <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$ventas['COD_VENTA']}}">
               Eliminar
            </button> 
       </td>
       </tr>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$ventas['COD_VENTA']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>
            
            <!-- a href="ventas" class="btn btn-danger">X</a> -->
            
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
           <form action="{{url('ventas/eliminarV/'.$ventas['COD_VENTA'])}}" method="post">
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
  'EL MODULO DE VENTAS',
  'success'
)

  </script>

<script src=https://code.jquery.com/jquery-3.5.1.js></script>
<script src=https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js></script>
<script src=https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    $(function(){
        $('#selecionar-producto').on('change',rellenardatos);
    });
</script>
<script> 
function rellenardatos(){
    var producto = $(this).val();
    
}

</script>


<script>
    //obtener datos para insertar
    function buscar(){
        var opcion = document.getElementById('selecionar-producto').value;
        var contenido = document.querySelector('#contenido')
        //window.location.href = 'http://127.0.0.1:8000/ventas/actualizarP/'+ opcion;

        //obtener datos de la api
        //ojo la url no es de la Api es de un controlador que se conecta a la api
        const url = 'http://127.0.0.1:8000/ventas/actualizarP/'+ opcion;
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
            <input type="hidden" name="INV" value="${valor.COD_INV}">
            <input type="hidden" name="personas" value="1">
            <input type="hidden" name="cod_Producto" value="1">
            <!--       nombre de producto          -->
            <input type='hidden' id="nombreSel" name='nombre' class="form-control" value="${valor.NOM_PRODUCTOS}" required></input>
    
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



<script>
    function operaciones(){
        var cantidad = parseInt(document.getElementById('num1').value);
        var precio  = parseInt(document.getElementById('num2').value);
        
        var resul = precio * cantidad;

        document.getElementById('TB').value = resul;
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

<script>

    const editar = (id) =>{
        var contenid = document.querySelector('#ActualizaConte-'+id)
        
        //ojo la url no es de la Api es de un controlador que se conecta a la api
        const url= 'http://127.0.0.1:8000/ventas/actualizalo/'+ id;
        fetch(url)
        .then(data=>{return data.json()})
        .then(res=>{
            //console.log(res)
            pintar(res);
        })

        function pintar(res) {
            
            contenid.innerHTML = ''
            for(let valor of res){
                contenid.innerHTML += `
            <label class="form-label">
            <!-- Cod INV -->
            <input type='hidden' name='INV' class="form-control" tabindex="1" value="${valor.COD_INV}"></input> 
             </label>
             <label class="form-label">
                <!-- Cod Persona -->
            <input type='hidden' name='personas' class="form-control" tabindex="2" value="${valor.COD_PERSONA}"></input> 
            </label> 
            <label class="form-label">
            Nombre:
            <input type='text' name='nombre' class="form-control" value="${valor.NOM_PRODUCTO}" required></input>
            </label>
            <label class="form-label">
             Precio
             <input type='number' id="num2" name='precio' class="form-control" value="${valor.PREC_UNITARIO}"  required></input> 
             </label>
            <label class="form-label">
            Cantidad
            <input type='number' id="num1" name='cantidad' class="form-control" value="${valor.CANT_PRODUCTO}" onchange="return operaciones(); " required></input> 
             </label>
             <label class="form-label">
            TOTAL BRUTO
            <input type='number' id="TB" name='totalb' class="form-control" value="${valor.TOTAL_BRUTO}" required></input> 
            </label>
            <label class="form-label">
            Destino
            <input type='text' id="Dv" name='destino' formmethod="post" class="form-control" value="${valor.DESTINO_VENTA}" required></input>
            </label>
            <label class="form-label">
            Impuesto
        <input type='number' id="IMP" name='impuesto' class="form-control" value="${valor.IMPUE_TOTAL}" onchange="return operacionesTotal();" requered></input> 
        </label>
        <label class="form-label">
        Total
        <input type='number'  id="Total" name='total' class="form-control" value="${valor.TOTAL_VENTA}" required></input> 
        </label>
        <input name="venta" type="hidden" value="${valor.COD_VENTA}">
           
    `
            }
            
        }
    }
</script>


@stop
