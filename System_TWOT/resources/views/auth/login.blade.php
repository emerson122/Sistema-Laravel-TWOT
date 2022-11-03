@extends('layouts.login')

@section('title','Login')

@section('content')
<div class="block mx-auto my-12 px">
<h1 class="text-3xl text-center font-bold">Login</h1>
</div>
<center>
<div id="template-bg-1">
<div
class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
<div class="card p-4 text-light bg-dark mb-5">
<div class="card-header">
    @if(Session::has('NOregistrado'))
    <b><FONT COLOR="green">
    {{Session::get('NOregistrado')}} 
    </FONT>
    </b>
    <br>
    @endif

    @if(Session::has('contramala'))
    <b><FONT COLOR="red">
    {{Session::get('contramala')}} 
    </FONT>
    </b>
    <br>
    @endif
<h3>Iniciar sesión </h3>
</div>
<div class="card-body w-100">
    <!-- metodo post-->
<form name="login" action="" method="post">
    @csrf
<div class="input-group form-group mt-3">
<div class="bg-secondary rounded-start">
<span class="m-3"><i class="fas fa-user mt-2"></i></span>
</div>
<input type="email" class="form-control" placeholder="email..."
name="email" required>
</div>
<div class="input-group form-group mt-3">
<div class="bg-secondary rounded-start">
<span class="m-3"><i class="fas fa-key mt-2"></i></span>
</div>
<input type="password" class="form-control" placeholder="Contraseña....."
name="pass" required>
</div>
<div class="form-group mt-5">
<button type="submit" class="btn btn-outline-success">Ingresar</button>
</div>
</form>
<?php if(!empty($loginResult)){?>
<div class="text-danger"><?php echo $loginResult;?></div>
<?php }?>
</div>
<div class="card-footer">
<div class="d-flex justify-content-center">
<div class="text-primary">Si es un usuario registrado, inicie sesión aquí.</div>
</div>
</div>
</div>
</div>
</div>
</center>
@endsection