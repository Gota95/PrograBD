@extends('welcome')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="container">
        <div class="nk-sidebar" style="position: fixed; left: 0; top: 5em;">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Categorias</li>

                    <div class="form-group">
                          @foreach($categorias as $cat)
                            <li class="m-2"><button value="{{$cat->nombre}}" class="btn btn-primary p-0 w-100 bg-dark" name='boton'>
                                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                    </i><span  class="nav-text text-warning font-weight-bold">{{$cat->nombre}}</span> 
                                </a>
                                </button>
                            </li>
                          @endforeach
                    </div>

                    
                    
                </ul>
            </div>
        </div>
</div>
<script type="text/javascript">
    $("button").click(function() {
        var nombre=$(this).val();
        location.href ="/catalogo?searchText="+nombre;

    });
</script>
        <!--**********************************
            Sidebar end
        ***********************************-->
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="margin-top:7%; margin-left:1rem">
        <div class="col-lg-12 col-lm-8" >
            <div class="card ">
                <div class="card-header">
                    <h1 class="text-center">Cotización</h1>
                </div>
                <div class="card-body">
                <h3 class="float-left"><strong>Fecha:</strong> {{date('Y/m/d')}}</h3><button class="btn btn-danger float-right">X</button>
                <div class="container-fluid mt-5">
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr class="active text-center">
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th style="width:25px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Session::get('cart') as $values) 
                        <tr>
                            <td>{{$values['nombre']}}</td>
                            <td>{{$values['cantidad']}}</td>
                            <td>{{$values['precio']}}</td>
                            <td>{{$values['subtotal']}}</td>
                            <td><a href="#" class="btn btn-danger">Eliminar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
@endsection