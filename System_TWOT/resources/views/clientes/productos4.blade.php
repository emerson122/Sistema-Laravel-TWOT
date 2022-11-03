<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
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
        <div class="col py-3">
           vista 4
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
  </body>
</html>