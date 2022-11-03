@extends('adminlte::page')

@section('title', 'Compras')


@section('content_header')
    <h1>COMPRAS</h1>
@stop
@section('content')

<div class="modal-container"> 
    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#dialogo1">Realizar una Compra</button>
    
    <div class="modal fade bd-example-modal-lg" id="dialogo1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Cabe-->
          <div class="modal-header">
            <h4 class="modal-title">Registrar Compras</h4>
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">

             <center>
             <form id="ventas" action="{{url('compras/agregarC')}}" method="post"> 
            {!! csrf_field() !!}
            <label class="form-label">
            <!-- COD_EMPRESA -->
            <input type='hidden' name='empresa' class="form-control" value="1" tabindex="1"></input> 
             </label>
            <label class="form-label">
            <!-- COD_PERSONA -->
          <input type='hidden' name='persona' class="form-control" value="1" tabindex="2"></input> 
            </label>
    
    
    <label class="form-label">
    Proveedor
     <select name="destino" class="form-control" id="selecionar-producto" onchange="return buscar();" required>
         <option value="">Selecione un proveedor</option>
     @foreach($proveedoresA as $proveedor)
         <option value="{{$proveedor['PROVEEDORES']}}">{{$proveedor['PROVEEDORES']}}</option>
     @endforeach
        </select>
     <input type="hidden"type="prove" value="{{$proveedor['COD_EMPRESA']}}">

     <label class="form-label">
    Nombre de Producto
        <input type='text'id="nombre" name='producto' class="form-control" ></input> 
    </label>
    <label class="form-label">
   <center>Categoria</center>  
        <input type='text' name='categoria' class="form-control"></input> 
    </label>
    <br>
    <br>
    <label class="form-label">Descripcion del producto
    <input type="text" class="form-control" id="descripcion" name="descripcion">
    </label>
    <label class="form-label">
          <center>Precio </center>  
        <input type='number' id='num2' name='precio' class="form-control"></input> <!--  pattern="[0-9]*"-->
    </label>
    <center>
    <label class="form-label">
         <center> Impuesto </center>  
        <input type='number' id='num3' name='impuesto' class="form-control"></input> <!--  pattern="[0-9]*"-->
    </label>
    <label class="form-label">
        <center> Cantidad </center>  
        <input type='number' id='num1' name='cantidad' class="form-control" onchange="return operaciones(); "></input> <!--  pattern="[0-9]*"-->
    </label>
    </center>
    <center>
    <label class="form-label">
    Total
        <input type='number' id="TB" name='total' class="form-control"></input> <!--  pattern="[0-9]*"-->
    </label>
    </center>
    <br>
    <button type="submit" class="btn btn-primary">Realizar </button>
</form>


<!-- parte que se oculta-->
<b>Deseas agregar imagen del producto?</b>
    <input type="checkbox" name="check" id="check" value="1" onchange="return verContenido();" />
    <div id="content" class="bg-secondary" style="display: none;">
    <form action="http://localhost:8080/imagenes/nuevoproducto" method="post" enctype="multipart/form-data">
    <label class="form-label">Imagen del producto
    <input type="file" class="form-control" name="file" required/>
    
    </label>
    <div id="pintame">

    </div>
    <!--https://es.stackoverflow.com/questions/1784/c%C3%B3mo-puedo-hacer-submit-usando-un-bot%C3%B3n-que-no-se-encuentra-dentro-del-formular -->
    <button class="btn btn-info"  type="submit" >Guardar imagen</button>
    </form>
    <br>
</div>
</div>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</center>
</div>
</div>
</div>




<table id="ejemplo" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">Nombre de Productos</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Fecha</th>
            <th scope="col">Categoria</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Impuesto</th>
            <th scope="col">TOTAL</th>
            <th scope="col">ACCIONES</th>
        </tr>
</thead>
<tbody>
    @foreach($comprasArreglo as $compras) 
    <tr>
    
       <td>{{$compras['COD_COMPRA']}}</td>
       <td style="display: none;">{{$compras['COD_EMPRESA']}}</td>
       <td style="display: none;">{{$compras['COD_PERSONA']}}</td>
       <td>{{$compras['NOM_PROD']}}</td>
       <td>{{$compras['DEST_PROD']}}</td>
       <td>{{substr($compras['FEC_COMP'],0,10)}}</td>
       <td>{{$compras['DEST_CATEG']}}</td>
       <td>{{$compras['CANT_PROD']}}</td>
       <td>${{$compras['PREC_COMP']}}</td>
       <td>{{$compras['IMPU_COMP']}}</td>
       <td>{{$compras['TOL_COMP']}}.00</td>
       <td>
           <!-- a href="/compras/actualizalo/{{$compras['COD_COMPRA']}}" class="btn btn-success">Editar</a>  -->
           <button type="button" class="btn btn-success openBtn btn-sm" data-toggle="modal" data-target="#modal-editar-{{$compras['COD_COMPRA']}}" onclick="editar({{$compras['COD_COMPRA']}})">
               Editar
            </button> 
            <!--Ventana Modal para la Alerta de Editar--->
        <div class="modal fade bd-example-modal-sm" name="{{$compras['COD_COMPRA']}}" id="modal-editar-{{$compras['COD_COMPRA']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Actualizar Compra</h4>
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
        
             <form action="{{url('compras/actualizarC')}}" method="post"> 
                {!! csrf_field() !!}
                          @method('PUT') 
                <div id="ActualizaConte-{{$compras['COD_COMPRA']}}"> <!-- inicio prueba -->
                </div>
                <button type="submit" class="btn btn-success">Actualizar </button>
                </form> 
           
           </div>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
<!-- fin de modal para actualizar dato -->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar-{{$compras['COD_COMPRA']}}">
               Eliminar
            </button> 
       </td>
       </tr>
        <!--Ventana Modal para la Alerta de Eliminar--->
        <div class="modal fade bd-example-modal-sm" id="modal-eliminar-{{$compras['COD_COMPRA']}}">
            <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Estas seguro que deseas Eliminarlo?</h4>
            
            
          </div>
          
             <!-- cuerpo del diálogo -->
             <div class="modal-body">
           <form action="{{url('compras/eliminar/'.$compras['COD_COMPRA'])}}" method="post">
               @csrf @method('DELETE')
           <button  class="btn btn-danger">Eliminar</button>
           
           </form>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
           </div>
</div>
</div>
</div>
           
           
           
           </form>
       </td>
       </tr>
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
    function operaciones(){
        
        var cantidad = parseInt(document.getElementById('num1').value);
        var precio  = parseInt(document.getElementById('num2').value);
        var imp = parseInt(document.getElementById('num3').value);
      
   
        var temp = precio * cantidad;

        var resul= temp + imp;
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
        const url= 'http://127.0.0.1:8000/compras/actualizar/'+ id;
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
                <label for="">Nombre de producto</label>
                <input type='hidden' name='empresa' class="form-control" tabindex="1" value="${valor.COD_EMPRESA}"></input>
                <input type='hidden' name='persona' class="form-control" tabindex="1" value="${valor.COD_PERSONA}"></input>
                
                <input type='text' name='producto' class="form-control" tabindex="1" value="${valor.NOM_PROD}"></input>
                <label for="">Proveedor</label>
                <input type='text' name='destino' class="form-control" tabindex="1" value="${valor.DEST_PROD}"></input>
                
                <label for="">Categoria</label>
                <input type='text' name='categoria' class="form-control" tabindex="1" value="${valor.DEST_CATEG}"></input>

                <label for="">Cantidad</label>
                <input type='number' name='cantidad' class="form-control" tabindex="1" value="${valor.CANT_PROD}"></input>

                <label for="">Precio</label>
                <input type='number' name='precio' class="form-control" tabindex="1" value="${valor.PREC_COMP}"></input>

                <label for="">Impuesto</label>
                <input type='number' name='impuesto' class="form-control" tabindex="1" value="${valor.IMPU_COMP}"></input>

                <label for="">Total</label>
                <input type='number' name='total' class="form-control" tabindex="1" value="${valor.TOL_COMP}"></input>

                <input type= 'hidden' name="compra" value="${valor.COD_COMPRA}"> `
            }
            
        }
    }
</script>





<script type="text/javascript">
    function verContenido() {
        element = document.getElementById("content");
        nombre  = String(document.getElementById('nombre').value);
        descripcion = String(document.getElementById('descripcion').value);
        precio = String(document.getElementById('num2').value);
        
        var foto = document.querySelector('#pintame')
        

        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
            foto.innerHTML=`
            <input type='hidden' name='nombre' class="form-control" tabindex="1" value="${nombre}"></input>
            <input type='hidden' name='descripcion' class="form-control" tabindex="1" value="${descripcion}"></input>
            <input type='hidden' name='precio' class="form-control" tabindex="1" value="${precio}"></input>       
            `
            
        }
        else {
            element.style.display='none';
           
        }
    }
</script>
@stop



